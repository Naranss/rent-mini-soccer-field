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
    protected static function booted(): void
    {
        if (Auth::check() && Auth::user()->role == 'OWNER') {
            $ownerFieldIds = Auth::user()->fields->pluck('id');
            static::addGlobalScope('field_id', function (Builder $builder) use ($ownerFieldIds) {
                $builder->whereIn('field_id', $ownerFieldIds);
            });
        }
    }

    public function scopeFilter($query, $search = null)
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
