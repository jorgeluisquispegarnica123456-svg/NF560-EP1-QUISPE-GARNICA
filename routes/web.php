<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

Route::get('/', [LibroController::class, 'inicio'])
    ->name('inicio');

Route::get('/catalogo', [LibroController::class, 'catalogo'])
    ->name('catalogo');

Route::get('/libro/{id}', [LibroController::class, 'detalle'])
    ->name('libro.detalle');

Route::get('/nosotros', [LibroController::class, 'nosotros'])
    ->name('nosotros');