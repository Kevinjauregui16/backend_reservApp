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
    public function store(Request $request)
    {
         $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'reservation_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $reservation = Reservation::create([
            ...$validated,
            'user_clerk_id' => $request->clerk_user_id, // desde middleware
        ]);

        return response()->json($reservation, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(Reservation::with('service')->findOrFail($id));
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
