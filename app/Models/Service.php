<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'name',
        'ranking',
        'location',
        'description',
        'duration',
        'price'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
