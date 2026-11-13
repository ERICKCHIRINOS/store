<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\ProveedorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bodega', [BodegaController::class, 'index'])->name('bodegas.index');
Route::post('/bodega', [BodegaController::class, 'store'])->name('bodegas.store');
Route::delete('/bodega/{id}', [BodegaController::class, 'destroy'])->name('bodegas.destroy');
Route::put('/bodega/{bodega}', [BodegaController::class, 'update'])->name('bodegas.update');

Route::get('/categoria', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categoria', [CategoriaController::class, 'store'])->name('categorias.store');
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::put('/categoria/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');

Route::get('/cliente', [ClienteController::class, 'index'])->name('clientes.index');
Route::post('/cliente', [ClienteController::class, 'store'])->name('clientes.store');
Route::delete('/cliente/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::put('/cliente/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');

Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleados.index');
Route::post('/empleado', [EmpleadoController::class, 'store'])->name('empleados.store');
Route::delete('/empleado/{id}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
Route::put('/empleado/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');

Route::get('/pedido', [PedidoController::class, 'index'])->name('pedidos.index');
Route::post('/pedido', [PedidoController::class, 'store'])->name('pedidos.store');
Route::delete('/pedido{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');
Route::put('/pedido{pedido}', [PedidoController::class, 'update'])->name('pedidos.update');

Route::get('/producto', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/producto', [ProductoController::class, 'store'])->name('productos.store');
Route::delete('/producto{id}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::put('/producto{producto}', [ProductoController::class, 'update'])->name('productos.update');

Route::get('/proveedor', [ProveedorController::class, 'index'])->name('proveedor.index');
Route::post('/proveedor', [ProveedorController::class, 'store'])->name('proveedor.store');
Route::delete('/proveedor{id}', [ProveedorController::class, 'destroy'])->name('proveedor.destroy');
Route::put('/proveedor{proveedor}', [ProveedorController::class, 'update'])->name('proveedor.update');
