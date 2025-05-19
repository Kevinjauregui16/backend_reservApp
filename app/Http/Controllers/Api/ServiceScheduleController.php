<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceSchedule;
use App\Models\Service;

class ServiceScheduleController extends Controller
{

    public function index($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return response()->json($service->schedules);
    }

    public function getSchedule($serviceId)
    {
        $service = Service::findOrFail($serviceId);
        return response()->json($service->schedules);
    }

    public function store(Request $request, $serviceId)
    {
        $request->validate([
            'day_of_week' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $service = Service::findOrFail($serviceId);

        $schedule = $service->schedules()->create([
            'day_of_week' => $request->day_of_week,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return response()->json($schedule, 201);
    }
}
