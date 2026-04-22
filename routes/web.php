<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Ruta principal de acceso libre
Route::get('/', [HomeController::class, 'index'])->name('inicio');