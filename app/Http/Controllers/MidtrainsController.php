<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Notification;
use App\Models\Payment;

class MidtransController extends Controller
{
    /**
     * Handle Midtrans notification.
     */
    public function notification(Request $request)
    {
        $notification = new Notification();
        $transactionStatus = $notification->transaction_status;
        $paymentType = $notification->payment_type;
        $orderId = $notification->order_id;

        // Find the payment record
        $payment = Payment::where('order_id', $orderId)->first();

        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        // Update payment status based on transaction status
        switch ($transactionStatus) {
            case 'capture':
                if ($paymentType == 'credit_card') {
                    if ($notification->fraud_status == 'challenge') {
                        $payment->status = 'pending';
                    } else {
                        $payment->status = 'success';
                    }
                }
                break;
            case 'settlement':
                $payment->status = 'success';
                break;
            case 'pending':
                $payment->status = 'pending';
                break;
            case 'deny':
                $payment->status = 'canceled';
                break;
            case 'expire':
                $payment->status = 'canceled';
                break;
            case 'cancel':
                $payment->status = 'canceled';
                break;
        }

        // Save the updated payment record
        $payment->save();

        return response()->json(['message' => 'Notification processed successfully']);
    }
}
