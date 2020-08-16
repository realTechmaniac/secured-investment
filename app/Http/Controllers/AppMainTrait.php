<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;

trait AppMainTrait{
    private function sendSms($message, $recipients)
    {
        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_AUTH_TOKEN");
        $twilio_number = getenv("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients, [
            'from' => $twilio_number,
            'body' => $message]
        );
    }

    private function serializePhoneNumberForSms($phone_number){
        $phone = substr($phone_number, 1);  //remove "0" and prepend "+234"
        return "+234".$phone;
    }
}
