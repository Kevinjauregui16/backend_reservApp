<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'clerk_id' => 'required|string|unique:users',
            'name' => 'required|string',
            'email' => 'required|email|unique:users'
        ]);

        $user = User::create($validated);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }

    public function getIdByClerkId(Request $request)
    {
        $clerkId = $request->query('clerk_id');
        $user = User::where('clerk_id', $clerkId)->first();

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json(['id' => $user->id]);
    }

    public function getReservations($id)
    {
        $user = User::with('reservations.service')->findOrFail($id);

        return response()->json([
            'user' => $user->only(['id', 'name', 'email']),
            'reservations' => $user->reservations
        ]);
    }
}
