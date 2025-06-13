<?php

namespace App\Helpers;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransHelper
{
    public static function generateSnapToken($booking)
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'booking_id' => $booking->booking->booking_id,
                'amount' => $booking->amount,
            ]
            ,'customer_details'=>[
                'name' => $booking->customer->name,
                'email' => $booking->customer->email,
            ]
        ];
    }
}
