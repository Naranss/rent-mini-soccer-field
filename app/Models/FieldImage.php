<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class FieldImage extends Model
{
    //
    protected $guarded = ['id'];

    // Return images belong to the owner only
    public function scopeOwnerId(Builder $query, $id) {
        return $query->where('owner_id', $id);
    }

    // Filter query by field name and owner name
    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('field', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('owner', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
        });
    }
    
    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
