<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Field extends Model
{
    /** @use HasFactory<\Database\Factories\FieldFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'owner_id',
        'description',
        'price',
        'status',
        'location'
    ];
    protected $casts = [
        'price' => 'integer',
    ];

    // Return images belong to the owner only
    protected static function booted(): void
    {
        if (Auth::check() && Auth::user()->role == 'OWNER') {
            static::addGlobalScope('ownerid', function (Builder $builder) {
                $builder->where('owner_id', Auth::id());
            });
        }
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
