<?php

namespace App\Http\Middleware;

use App\Models\Payment;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CanViewPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $payment = $request->route('payment');

        if (!$payment instanceof Payment) {
            $payment = Payment::find($payment);
        }

        if (!$payment) {
            abort(404, 'PAYMENT NOT FOUND');
        }

        if (
            $user->role === 'ADMIN' ||
            $user->id === $payment->customer_id ||
            $user->id === $payment->rentee_id
        ) {
            return $next($request);
        }

        abort(404, 'PAYMENT NOT FOUND');
    }
}
