<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('/products')->group(function () {
    Route::GET('/', [ProductoController::class, 'listProduct']); //obtener listado de los productos
    Route::POST('/', [ProductoController::class, 'store']);//crear producto
    Route::GET('/{id}', [ProductoController::class, 'listProductid']); //obtener productos por id
    Route::PUT('/{id}', [ProductoController::class, 'update']);//actualizar producto
    Route::GET('/{id}/prices', [ProductoController::class, 'pricexproduct']);//listado de precio de un producto
    Route::POST('/{id}/prices', [ProductoController::class, 'add_price_product']);//añadir nuevo precio al producto
    Route::DELETE('/{id}', [ProductoController::class, 'delete']);// Eliminar producto
});
