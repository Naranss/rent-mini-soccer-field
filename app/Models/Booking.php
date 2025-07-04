<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'field_id',
        'date',
        'start_time',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime',
    ];

    // Query bookings belong to owner's fields
    public function scopeFieldIds(Builder $query, $fieldIds) {
        return $query->whereIn('field_id', $fieldIds);
    }

    // Query bookings belong to customer
    public function scopeCustomerId(Builder $query, $id) {
        return $query->where('user_id', $id);
    }
    
    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })
                ->orWhereHas('field', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
        });
    }

    // Relasi dengan User (Customer)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan Field
    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }

    public function bookedHours()
    {
        return $this->hasMany(BookedHour::class);
    }
}
