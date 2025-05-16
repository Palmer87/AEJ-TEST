<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\projetController;
use App\Http\Controllers\PromoteurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('promoteurs', Admincontroller::class);
    Route::get('dashboard/promoteur', [PromoteurController::class, 'dashboard'])
        ->name('promoteur.dashboard')
        ->middleware('auth');
    Route::resource('promoteurs', PromoteurController::class);

});





Route::middleware(['auth'])->group(function () {
    Route::resource('gestionnaires', GestionnaireController::class);
    Route::get('/dashboard/gestionnaire', [GestionnaireController::class, 'dashboard'])->name('gestionnaire.dashboard');


});

Route::middleware(['auth'])->group(function () {
    Route::resource('projets', projetController::class);
    Route::post('/projets/{id}/valider', [ProjetController::class, 'valider'])->name('projets.valider');
    Route::post('/projets/{id}/rejeter', [ProjetController::class, 'rejeter'])->name('projets.rejeter');

    });

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [Admincontroller::class, 'index'])->name('dashboard');


    });


require __DIR__.'/auth.php';
