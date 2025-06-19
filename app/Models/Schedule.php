<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'field_id',
        'user_id',
        'hari',
        'start_time',
        'end_time',
        'status',
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
