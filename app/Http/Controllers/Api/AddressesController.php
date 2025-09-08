<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressesController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'neighborhood' => 'required|string|max:255',
        ]);

        $address = Address::create($validatedData);

        return response()->json($address, 201);
    }
}
