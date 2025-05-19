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
        'price',
        'start_time',
        'end_time',
    ];

    public function schedules()
    {
        return $this->hasMany(ServiceSchedule::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
