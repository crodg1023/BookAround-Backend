<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ClienteController;
use App\Http\Controllers\API\ComercioController;
use App\Http\Controllers\API\UsuarioController;
use App\Http\Controllers\API\CitaController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\CategoriaController;

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
