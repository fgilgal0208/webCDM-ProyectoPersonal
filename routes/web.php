<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PostController;

// Ruta principal de acceso libre
Route::get('/', [HomeController::class, 'index'])->name('inicio');
Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Panel Protegido
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('posts', PostController::class);
});