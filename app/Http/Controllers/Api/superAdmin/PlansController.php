<?php

namespace App\Http\Controllers\Api\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        return response()->json(['plans' => $plans]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0|lt:price',
            'duration_days' => 'required|integer|min:1',
            'is_active' => 'integer|in:0,1',
        ]);

        $plan = Plan::create($validatedData);

        return response()->json($plan, 201);
    }
}
