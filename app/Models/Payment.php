<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'booking_id',
        'customer_id',
        'rentee_id',
        'payment_method',
        'amount',
        'payment_date',
        'status',
    ];

    protected $casts = [
        'payment_date' => 'datetime',
    ];


    protected static function booted(): void
    {
        if (Auth::check()) {
            static::addGlobalScope('customer_id', function (Builder $builder) {
                $builder->where('customer_id', Auth::id());
            });
        }
    }

    // Relasi dengan Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }

    // Relasi dengan Customer (User)
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // Relasi dengan Rentee (Owner)
    public function rentee()
    {
        return $this->belongsTo(User::class, 'rentee_id');
    }
}
