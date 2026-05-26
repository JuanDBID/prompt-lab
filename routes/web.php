<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController; 
use Illuminate\Support\Facades\Route;

// 1. VISTA PRINCIPAL PÚBLICA
Route::get('/', [PostController::class, 'index'])->name('home');

// 2. RUTAS DE ACCIÓN PROTEGIDAS (Solo tras Login)
Route::middleware('auth')->group(function () {
    // Rutas para completar lecciones y videos
    Route::post('/leccion/{id}/completar', [PostController::class, 'completarLeccion'])->name('leccion.completar');
    Route::get('/leccion/{id}/profundizar', [PostController::class, 'mostrarTeoria'])->name('leccion.profundizar');
    Route::post('/leccion/{id}/profundizar/completar', [PostController::class, 'completarTeoria'])->name('leccion.teoria.completar');
    
    // Rutas de la sección de juegos y XP de juegos
    Route::get('/juegos', [PostController::class, 'juegos'])->name('juegos.index');
    Route::get('/juegos/completar/{id}', [PostController::class, 'completarJuego'])->name('juegos.completar');

    // Rutas del Perfil de Usuario (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. CARGA DE RUTAS DE AUTENTICACIÓN
require __DIR__.'/auth.php';
