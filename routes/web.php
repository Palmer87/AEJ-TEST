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
});





Route::get('/dashboard/gestionnaire', [GestionnaireController::class, 'dashboard'])
    ->name('gestionnaire.dashboard')
    ->middleware('auth');

route::resource('gestionnaires', GestionnaireController::class);

 Route::middleware(['auth'])->group(function () {
        Route::resource('projets', projetController::class);

    });
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [Admincontroller::class, 'index'])->name('dashboard');
        Route::post('/projets/{projet}/valider', [Admincontroller::class, 'valider'])->name('projets.valider');
        Route::post('/projets/{projet}/rejeter', [Admincontroller::class, 'rejeter'])->name('projets.rejeter');

    });


require __DIR__.'/auth.php';
