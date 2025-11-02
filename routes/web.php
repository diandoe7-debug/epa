<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para la página principal del panel
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas del módulo de eventos (por ahora sin login)
Route::resource('events', EventController::class);
