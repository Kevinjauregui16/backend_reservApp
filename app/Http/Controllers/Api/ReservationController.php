<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Reservation::with('service')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'service_id' => 'required|exists:services,id',
    //         'user_id' => 'required|exists:users,id',
    //         'start_time' => 'required|date_format:Y-m-d H:i:s',
    //         'end_time' => 'required|date_format:Y-m-d H:i:s',
    //     ]);

    //     $reservation = Reservation::create($validated);

    //     return response()->json($reservation, 201);
    // }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'user_id' => 'required|exists:users,id',
            'start_time' => 'required|date_format:Y-m-d H:i:s',
            'end_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        if (strtotime($validated['start_time']) < strtotime(now())) {
            return response()->json(['message' => 'No puedes reservar en una fecha pasada.'], 422);
        }

        // Verificar si ya existe una reserva en ese horario para el mismo servicio
        $conflict = Reservation::where('service_id', $validated['service_id'])
            ->where(function ($query) use ($validated) {
                $query->where('start_time', '<', $validated['end_time'])
                    ->where('end_time', '>', $validated['start_time']);
            })
            ->exists();

        if ($conflict) {
            return response()->json(['message' => 'El horario ya está reservado para este servicio.'], 409);
        }

        $reservation = Reservation::create($validated);

        return response()->json($reservation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(Reservation::with('service')->findOrFail($id));
    }

    public function getReservationsByService($id)
    {
        $reservations = Reservation::where('service_id', $id)->with('service')->get();
        return response()->json($reservations);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Reservation::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
