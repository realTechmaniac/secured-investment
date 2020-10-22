<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Twilio\Rest\Client;

trait AppMainTrait
{
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

    private function serializePhoneNumberForSms($phone_number)
    {
        $phone = substr($phone_number, 1);  //remove "0" and prepend "+234"
        return "+234" . $phone;
    }






    /*General Helpers*/
    public static function receiptExist(object $obj, $column)
    {
        return in_array($obj->merge->provide_help_id, array_column($obj->receiptUploads->toArray(), $column));
    }

    public static function getKeyValue(object $obj, $column, $arrayKey)
    {
        return $obj->receiptUploads->toArray()
        [array_search(
            $obj->merge->provide_help_id,
            array_column(
                $obj->receiptUploads->toArray(), $column
            )
        )]
        [$arrayKey];
    }

    public static function mergeExpiresAt(object $obj)
    {
        return Carbon::parse($obj->merge->expires_at)->format('Y/m/d H:i:s');
    }





    /*For GH.. ****Remember to wire all functions together later for cleaner code.. if time permits*****/
    public static function ghReceiptExist(object $obj, $column)
    {
        return in_array($obj->merge->get_help_id, array_column($obj->receiptUploads->toArray(), $column));
    }

    public static function ghGetKeyValue(object $obj, $column, $arrayKey)
    {
        return $obj->receiptUploads->toArray()
        [array_search(
            $obj->merge->get_help_id,
            array_column(
                $obj->receiptUploads->toArray(), $column
            )
        )]
        [$arrayKey];
    }

    /*Fake Receipt Confirmation*/
    public static function isMergeConfirmed(object $obj)
    {
        return in_array($obj->get_help_id, array_column($obj->provideHelp->unConfirmedGh->toArray(), 'id'));
    }
}
