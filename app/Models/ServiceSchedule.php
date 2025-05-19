<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSchedule extends Model
{
    protected $fillable = [
        'service_id',
        'day_of_week',
        'start_time',
        'end_time'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
