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
            'category_id' => 'required|integer|exists:categories,id',
            'street' => 'nullable|string|max:255',
            'number_ext' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'neighborhood' => 'nullable|string|max:255',
            'url_maps' => 'required|url|max:255',
            'phone' => 'nullable|string|max:255'
        ]);

        $store = Store::create($validatedData);

        return response()->json($store, 201);
    }
}
