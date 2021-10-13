<?php


namespace App\Http\Controllers;


use App\Models\Appointment;
use Illuminate\Support\Facades\Http;

class ConfirmationController extends Controller
{
    public function render(Appointment $appointment){
        /*
         *  make a request to klarna to retrieve the order
         */
        $klarna_order_id = $appointment->klarna_order_id;
        $response = Http::withBasicAuth('PK45418_9cb391cd02a1', 'ngVXPw5cTH02Rqyj')
            ->withHeaders(['content-type'=>'application/json'])
            ->get("https://api.playground.klarna.com/checkout/v3/orders/$klarna_order_id");
        if (!$response->successful()) {
            dd($response->json());
        }
        /*
         * get the order create response from klarna
         */
        $klarna_return = $response->json();
        $html_snippet = $klarna_return['html_snippet'];

        return view('thank-you', ['name'=>$appointment->customer_name, 'html_snippet'=>$html_snippet]);
    }
}