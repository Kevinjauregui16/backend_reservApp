<?php

use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ReservationController;

// Rutas para los servicios
Route::get('services', [ServiceController::class, 'index']);         // Mostrar todos los servicios
Route::post('services', [ServiceController::class, 'store']);        // Crear un servicio
Route::get('services/{id}', [ServiceController::class, 'show']);     // Ver un servicio por ID
Route::put('services/{id}', [ServiceController::class, 'update']);   // Actualizar un servicio
Route::delete('services/{id}', [ServiceController::class, 'destroy']); // Eliminar un servicio

// Rutas protegidas por middleware que verifica JWT de Clerk para las reservaciones
Route::middleware('clerk.auth')->group(function () {
    Route::get('reservations', [ReservationController::class, 'index']);       // Listar todas las reservaciones
    Route::post('reservations', [ReservationController::class, 'store']);      // Crear una reservación
    Route::get('reservations/{id}', [ReservationController::class, 'show']);   // Ver una reservación por ID
    Route::delete('reservations/{id}', [ReservationController::class, 'destroy']); // Eliminar una reservación
});
