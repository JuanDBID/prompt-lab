<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// La ruta principal ahora cargará el método index de nuestro controlador
Route::get('/', [PostController::class, 'index'])->name('home');
