<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    /** API Productos*/

    Route::apiResource('/productos', ProductoController::class);
    /** API Ordenes */
    Route::apiResource('/pedidos', PedidoController::class);

    /** API Administrador */
    Route::apiResource('/admin', AdminController::class);
});

Route::apiResource('/categorias', CategoriaController::class);

//Autenticacion
Route::post('/registro', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
