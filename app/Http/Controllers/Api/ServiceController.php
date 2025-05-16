<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(service::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string',
            'name' => 'required|string',
            'ranking' => 'nullable|numeric|min:0|max:5',
            'location' => 'nullable|string',
            'description' => 'nullable|string',
            'duration' => 'nullable|integer',
            'price' => 'nullable|numeric'
        ]);

        $service = Service::create($validated);

        return response()->json($service, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json(Service::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->only([
            'category',
            'name',
            'ranking',
            'location',
            'description',
            'duration',
            'price'
        ]));
        return response()->json($service);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id); // Buscar el servicio
        $service->delete(); // Eliminar el servicio

        return response()->json(['message' => 'Servicio eliminado correctamente'], 200);
    }
}
