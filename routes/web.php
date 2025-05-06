<?php

use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\projetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\PromoteurController;

Route::get('/dashboard/promoteur', [PromoteurController::class, 'dashboard'])
    ->name('promoteur.dashboard')
    ->middleware('auth');
Route::get('/dashboard/gestionnaire', [GestionnaireController::class, 'dashboard'])
    ->name('gestionnaire.dashboard')
    ->middleware('auth');


    Route::middleware(['auth'])->group(function () {
        Route::resource('projets', projetController::class);

    });


require __DIR__.'/auth.php';
