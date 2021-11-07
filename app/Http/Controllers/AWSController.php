<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AWSController extends Controller
{
    public function handle_bounces(Request $request){
        //SubscriptionConfirmation, Notification and UnsubscribeConfirmation
        if ($request->header('x-amz-sns-message-type') === 'SubscriptionConfirmation '){

            $body = $request->json();
            $subscribeURL = $body['SubscribeURL'];
            Http::get($subscribeURL);
        }
    }
}