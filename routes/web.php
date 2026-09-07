<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatoController;

Route::get('/', [CandidatoController::class, 'create'])->name('candidato.create');
Route::post('/candidatos', [CandidatoController::class, 'store'])->name('candidato.store');

Route::get('/dashboard', [CandidatoController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/candidatos/{candidato}/status', [CandidatoController::class, 'updateStatus'])->name('candidato.status');
    Route::get('/cargos', [\App\Http\Controllers\CargoController::class, 'index'])->name('cargos.index');
    Route::post('/cargos', [\App\Http\Controllers\CargoController::class, 'store'])->name('cargos.store');
    Route::patch('/cargos/{cargo}/toggle', [\App\Http\Controllers\CargoController::class, 'toggle'])->name('cargos.toggle');
});

require __DIR__.'/auth.php';
