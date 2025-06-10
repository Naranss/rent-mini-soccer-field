<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;

    protected $fillabel = [
        'start_time',
        'end_time',
        'hari',
    ];

    protected $casts = [
        'hari'=> 'enum',
    ];
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
