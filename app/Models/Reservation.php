<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'user_id', // Clerk user ID
        'reservation_time',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

