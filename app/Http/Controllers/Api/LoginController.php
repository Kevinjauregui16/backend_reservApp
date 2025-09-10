<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $client = Client::where('email', $request->email)->first();

        if (!$client || !Hash::check($request->password, $client->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $token = $client->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login exitoso',
            'client'  => $client->only(['id', 'name', 'email', 'store_id']),
            'token'   => $token
        ]);
    }
}
