<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
