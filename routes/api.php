<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ServiceScheduleController;
use App\Http\Controllers\Api\StoresController;
// use App\Http\Controllers\Api\AddressesController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\superAdmin\DashboardController;
use App\Http\Controllers\Api\superAdmin\CategoriesController;
use App\Http\Controllers\Api\superAdmin\ClientsController;
use App\Http\Controllers\Api\superAdmin\PlansController;

// RUTAS DE SERVICIOS

Route::get('/ping', function () {
    return response()->json(['message' => 'API en funcionamiento']);
});

Route::prefix('super-admin')->middleware('auth:sanctum')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('categories', CategoriesController::class);
    Route::resource('clients', ClientsController::class);
    Route::resource('stores', StoresController::class);
    Route::resource('plans', PlansController::class);
    // Route::resource('addresses', AddressesController::class);
});

Route::post('/login', [LoginController::class, 'login']);

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    //
});

// Route::prefix('/clients')->group(function () {
//     Route::post('/', [ClientsController::class, 'store']); // Crear un cliente
//     Route::post('/create-store', [StoresController::class, 'store']); // Crear una tienda
//     Route::post('/create-address', [AddressesController::class, 'store']); // Crear una dirección
// });

Route::prefix('customers')->group(function () {
    //
});


//rutas panel de usuarios
Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index']);                // Listar todos los servicios
    Route::post('/create', [ServiceController::class, 'store']);         // Crear un servicio
    Route::get('/search/{name}', [ServiceController::class, 'searchService']); // Buscar un servicio por nombre
    Route::get('/filterBy/{category}', [ServiceController::class, 'serviceByCategory']); // Filtrar servicios por categoría
    Route::get('/filter', [ServiceController::class, 'filterService']); // Filtrar servicios por nombre y/o ubicación

    // RUTAS DE HORARIOS DE SERVICIO (más específicas primero)
    Route::get('/{id}/schedules', [ServiceScheduleController::class, 'getSchedule']); // Listar horarios de un servicio
    Route::get('/{id}/schedules', [ServiceScheduleController::class, 'index']);      // Listar horarios de un servicio
    Route::post('/{id}/schedules', [ServiceScheduleController::class, 'store']);     // Crear un horario para un servicio

    Route::get('/{id}', [ServiceController::class, 'show']);             // Ver un servicio por ID
    Route::put('/{id}', [ServiceController::class, 'update']);           // Actualizar un servicio
    Route::delete('/{id}', [ServiceController::class, 'destroy']);       // Eliminar un servicio
});

// RUTAS DE USUARIOS
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);         // Listar todos los usuarios
    Route::get('/getIdByClerkId', [UserController::class, 'getIdByClerkId']); // Obtener ID de usuario por clerk_id
    Route::post('/', [UserController::class, 'store']); // Registrar un usuario
    Route::get('/{id}/reservations', [UserController::class, 'getReservations']); // Listar reservaciones de un usuario
});

// RUTAS DE RESERVACIONES
Route::prefix('reservations')->group(function () {
    Route::get('/by-service/{service_id}', [ReservationController::class, 'getReservationsByService']); // Listar reservaciones de un servicio
    Route::get('/', [ReservationController::class, 'index']);         // Listar todas las reservaciones
    Route::post('/', [ReservationController::class, 'store']);        // Crear una reservación
    Route::get('/{id}', [ReservationController::class, 'show']);      // Ver una reservación por ID
    Route::delete('/{id}', [ReservationController::class, 'destroy']); // Eliminar una reservación
});
