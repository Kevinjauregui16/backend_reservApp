<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;
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
        if ($client && Hash::check($request->password, $client->password)) {
            $token = $client->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'Login exitoso (cliente)',
                'client'  => $client->only(['id', 'name', 'email', 'store_id']),
                'token'   => $token
            ]);
        }

        $user = User::where('email', $request->email)->first();
        if (
            $user &&
            Hash::check($request->password, $user->password) &&
            $user->hasRole('superadmin')
        ) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'Login exitoso (superadmin)',
                'user'    => $user->only(['id', 'name', 'email']),
                'role'    => $user->getRoleNames()->first(),
                'token'   => $token
            ]);
        }

        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }
}
