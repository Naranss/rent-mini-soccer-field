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

    // Query based on customer_id or rentee_id
    public function scopeCustomerOwner(Builder $query, $id)
    {
        return $query->where('customer_id', $id)
            ->orWhere('rentee_id', $id);
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->whereHas('customer', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
                ->orWhere('order_id', 'like', '%' . $search . '%');
        });
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
