<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    /** @use HasFactory<\Database\Factories\FieldFactory> */
    use HasFactory;

    protected $fillable=[
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
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
