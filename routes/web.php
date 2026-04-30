<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('inicio');

// Rutas de Acceso al Admin
Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/noticia/{post}', [HomeController::class, 'show'])->name('noticias.show');


Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('posts', PostController::class);
});

Route::get('/partidos', [\App\Http\Controllers\Admin\GameController::class, 'index'])->name('games.index');
Route::put('/partidos/{game}', [\App\Http\Controllers\Admin\GameController::class, 'update'])->name('games.update');