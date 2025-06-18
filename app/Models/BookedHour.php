<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BookedHour extends Model
{
    //
    protected $guarded = ['id'];

    // Filter query by field name and owner name
    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('field_id', 'like', '%' . $search . '%')
                ->orWhereHas('owner', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        });
    }

    // Filter by field ID and future dates
    public function scopeFieldFutureBookings(Builder $query, $fieldId)
    {
        return $query->where('field_id', $fieldId)
                    ->where('schedule_date', '>=', Carbon::now()->toDateString());
    }

    
}
