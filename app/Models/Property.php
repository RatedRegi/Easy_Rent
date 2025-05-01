<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'city',
        'address',
        'price',
        'rooms',
    ];

    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
