<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categoria', [CategoriaController::class, 'index']);
Route::get('/cliente', [ClienteController::class, 'index']);
Route::get('/empleado', [EmpleadoController::class, 'index']);
Route::get('/producto', [ProductoController::class, 'index']);
Route::get('/pedido', [PedidoController::class, 'index']);
