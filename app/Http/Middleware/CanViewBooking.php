<?php

namespace App\Http\Middleware;

use App\Models\Booking;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CanViewBooking
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $booking = $request->route('booking');

        if (!$booking instanceof Booking) {
            $booking = Booking::find($booking);
        }

        if (
            $user->role === 'ADMIN' ||
            $user->id === $booking->user_id ||
            ($user->role === 'OWNER' && $user->fields->pluck('id')->contains($booking->field_id))
        ) {
            return $next($request);
        }

        abort(404, 'BOOKING NOT FOUND');
    }
}
