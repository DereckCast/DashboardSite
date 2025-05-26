<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/ciudadanos/por-ciudad', [DashboardController::class, 'ciudadanosPorCiudad'])->name('ciudadanos.por-ciudad');

    Route::post('/reporte/enviar', [DashboardController::class, 'enviarReporte'])->name('reporte.enviar');

    Route::delete('/ciudad/{id}', [DashboardController::class, 'eliminarCiudad'])->name('ciudad.eliminar');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
