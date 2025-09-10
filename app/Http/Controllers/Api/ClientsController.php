<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'password' => 'required|string|min:5',
            'phone' => 'nullable|string|max:255',
            'store_id' => 'required|exists:stores,id',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $client = Client::create($validatedData);
        $client->assignRole('admin');

        return response()->json($client, 201);
    }
}
