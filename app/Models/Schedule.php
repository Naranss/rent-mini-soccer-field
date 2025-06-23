<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Schedule extends Model
{
    /** @use HasFactory<\Database\Factories\ScheduleFactory> */
    use HasFactory;

    protected $fillable = [
        'field_id',
        'hari',
        'start_time',
        'end_time',
    ];


    // Return schedules belong to the owner only
    public function scopeFieldIds(Builder $query, $ownerFieldIds) {
        return $query->whereIn('field_id', $ownerFieldIds);
    }

    public function scopeFilter(Builder $query, $search = null)
    {
        if ($search) {
            $query->whereHas('field', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })
                ->orWhere('hari', 'like', "%$search%");
        }
        return $query;
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
