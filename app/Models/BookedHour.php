<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BookedHour extends Model
{
    //
    protected $guarded = ['id'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function scopeBookingId(Builder $query, $bookingId) 
    {
        return $query->where('booking_id', $bookingId);
    }

    // Filter by field ID and future dates, excluding canceled bookings
    public function scopeFieldFutureBookings(Builder $query, $fieldId)
    {
        return $query->where('field_id', $fieldId)
            ->where('schedule_date', '>=', Carbon::now()->toDateString())
            ->whereHas('booking', function($query) {
                $query->where('status', '!=', 'canceled');
            });
    }

    public function schedule() {
        return $this->belongsTo(Schedule::class);
    }
}
