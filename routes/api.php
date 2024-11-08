<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClienteController;
use App\Http\Controllers\API\ComercioController;
use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\API\CitaController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\CategoriaController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\CategoriasComercioController;
use App\Http\Controllers\API\ImageController;

/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::apiResource('customers', ClienteController::class);
Route::apiResource('companies', ComercioController::class);
Route::apiResource('users', UsuarioController::class);
Route::apiResource('appointments', CitaController::class);
Route::apiResource('reviews', ReviewController::class);
Route::apiResource('categories', CategoriaController::class);
Route::apiResource('business-categories', CategoriasComercioController::class);
Route::apiResource('images', ImageController::class);
Route::get('customers/{id}/image', [ImageController::class, 'getCustomerImage']);
Route::get('appointments/customers/{id}', [CitaController::class, 'getCustomerAppointments']);
Route::get('appointments/companies/{id}', [CitaController::class, 'getBusinessAppointments']);

Route::post('login', [LoginController::class, 'login']);
