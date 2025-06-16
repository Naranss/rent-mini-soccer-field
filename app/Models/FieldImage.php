<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FieldImage extends Model
{
    //
    protected $guarded = ['id'];

    // Return images belong to the owner only
    protected static function booted(): void
    {
        if (Auth::check() && Auth::user()->role == 'OWNER') {
            static::addGlobalScope('ownerid', function (Builder $builder) {
                $builder->where('owner_id', Auth::id());
            });
        }
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
