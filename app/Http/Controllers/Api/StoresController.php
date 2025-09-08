<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class StoresController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address_id' => 'required|exists:addresses,id',
            'category' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255'
        ]);

        $store = Store::create($validatedData);

        return response()->json($store, 201);
    }
}
