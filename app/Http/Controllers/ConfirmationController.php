<?php

namespace App\Http\Controllers;

use App\Jobs\ScheduleMeetings;
use App\Mail\AppointmentConfirmation;
use App\Models\Appointment;
use App\Models\BookedSlot;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ConfirmationController extends Controller
{
    public function render(Appointment $appointment)
    {
        Log::debug('in ConfirmationController\'s render');
        /*
         *  make a request to klarna to retrieve the order
         */
        $klarna_order_id = $appointment->klarna_order_id;
        $response = Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
            ->withHeaders(['content-type' => 'application/json'])
            ->get("https://api.playground.klarna.com/checkout/v3/orders/$klarna_order_id");
        if (!$response->successful()) {
            dd($response->json());
        }
        $klarna_return = $response->json();
        /*
         * create the user and leave the password empty for now.
         */
        User::updateOrInsert(
            ['email' => $klarna_return['billing_address']['email']],
            [
                'given_name' => $klarna_return['billing_address']['given_name'],
                'family_name' => $klarna_return['billing_address']['family_name'],
                'phone' => $klarna_return['billing_address']['email']
            ]
        );
        $user = User::where('email', '=', $klarna_return['billing_address']['email'])->first();
        if (isset($klarna_return['customer']['date_of_birth'])) {
            $user->date_of_birth = $klarna_return['customer']['date_of_birth'];
        }
        if (isset($klarna_return['customer']['gender'])) {
            $user->gender = $klarna_return['customer']['gender'];
        }
        $user->save();

        $appointment->customer_id = $user->id;

        /*
         * Retrieve the customer info from klarna
         */
        $appointment->given_name = $klarna_return['billing_address']['given_name'];
        $appointment->family_name = $klarna_return['billing_address']['family_name'];
        if (isset($klarna_return['customer']['date_of_birth'])) {
            $appointment->date_of_birth = $klarna_return['customer']['date_of_birth'];
        }
        if (isset($klarna_return['customer']['gender'])) {
            $appointment->gender = $klarna_return['customer']['gender'];
        }

        $appointment->purchase_country = $klarna_return['purchase_country'];
        $appointment->purchase_currency = $klarna_return['purchase_currency'];
        $appointment->locale = $klarna_return['locale'];

        $appointment->order_amount = $klarna_return['order_amount'];
        $appointment->email = $klarna_return['billing_address']['email'];
        $appointment->street_address = $klarna_return['billing_address']['street_address'];
        $appointment->postal_code = $klarna_return['billing_address']['postal_code'];
        $appointment->city = $klarna_return['billing_address']['city'];
        $appointment->country = $klarna_return['billing_address']['country'];
        if (isset($klarna_return['billing_address']['phone'])) {
            $appointment->phone = $klarna_return['billing_address']['phone'];
        }

        /*
         *  checkout completed, synchronize the checkout status and schedule a meeting with zoom
         */
        if ($klarna_return['status'] == 'checkout_complete') {
            if (!BookedSlot::checkIfBooked($appointment->date, $appointment->which_slot)) {
                BookedSlot::sealTheAppointment($appointment->date, $appointment->which_slot);
            }
            $appointment->payment_status = 1;
            /*
            * Save to the database
            */
            $appointment->save();

            // to re-hydrate it using fresh data from the database
            $appointment->refresh();

            // schedule a meeting using zoom and send the emails
            ScheduleMeetings::dispatch($appointment);

            Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
                ->withHeaders(['content-type' => 'application/json'])
                ->post("https://api.playground.klarna.com/ordermanagement/v1/orders/$klarna_order_id/acknowledge");
        } else {
            /*
            * Save to the database
            */
            $appointment->save();
        }

        $html_snippet = $klarna_return['html_snippet'];

        // to re-hydrate it using fresh data from the database
        $appointment->refresh();
        return view('thank-you', ['name' => $appointment->customer_name, 'html_snippet' => $html_snippet]);
    }

    public function push(Appointment $appointment)
    {
        /*
         *  make a request to klarna to retrieve the order and confirm its status
         */
        $klarna_order_id = $appointment->klarna_order_id;
        Log::debug("pushed by klarna");
        //$klarna_order_id = $appointment->klarna_order_id;
        $response =
            Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
                ->withHeaders(['content-type' => 'application/json', 'Authorization' => 'Basic pwhcueUff0MmwLShJiBE9JHA=='])
                ->get("https://api.playground.klarna.com/checkout/v3/orders/$klarna_order_id");
        if (!$response->successful()) {
            dd($response->json());
        }
        /*
         * read the response
         */
        $klarna_return = $response->json();
        Log::debug($klarna_return);

        if ($klarna_return['status'] == 'checkout_complete') {
            $appointment->payment_status = 1;
            $appointment->order_amount = $klarna_return['order_amount'];
            $appointment->save();

            Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
                ->withHeaders(['content-type' => 'application/json'])
                ->post("https://api.playground.klarna.com/ordermanagement/v1/orders/$klarna_order_id/acknowledge");
        }
    }

    public function ack(Appointment $appointment)
    {
        $klarna_order_id = $appointment->klarna_order_id;
        $response = Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
            ->withHeaders(['content-type' => 'application/json'])
            ->post("https://api.playground.klarna.com/ordermanagement/v1/orders/$klarna_order_id/acknowledge");
        dd($response->status());
    }

    public function checkStock(Appointment $appointment)
    {
        $date = $appointment->date;
        $which_slot = $appointment->which_slot;
        Log::debug('in checkStock');

        if (Appointment::isBookedAndPiad($date, $which_slot)) {
            /*
             * out of stock. reply with a HTTP status 200 OK
             */
            Log::debug('Okay! In stock.');
            return response('ok', 200)
                ->header('Content-Type', 'text/plain');
        } else {
            /*
             *  In stock, to reply with a HTTP status 303 and to include a Location header pointing to a page
             *  which informs the consumer why the purchase was not completed. The consumer will be redirected to this page.
             */
            Log::debug('Denied! Out of stock!');
            return response('see other', 303)
                ->header('Location ', '/out-of-stock');
        }
    }
}