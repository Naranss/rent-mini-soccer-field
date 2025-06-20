<?php

namespace App\Helpers;

use App\Models\Payment;
use Midtrans\Snap;

class MidtransHelper
{
    public static function generateSnapToken(Payment $payment)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;


        $params = [
            'transaction_details' => [
                'order_id' => $payment->order_id,
                'gross_amount' => $payment->amount
            ]
            ,'customer_details'=>[
                'first_name' => $payment->customer->name,
                'email' => $payment->customer->email,
            ]
        ];

        return Snap::getSnapToken($params);
    }
}
