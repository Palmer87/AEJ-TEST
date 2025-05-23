<?php

use App\Http\Controllers\Admin\ProjetController as AdminProjetController;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\GestionnaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\projetController;
use App\Http\Controllers\PromoteurController;
use App\Mail\ProjetStatutMail;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    notify()->success('Welcome to Laravel Notify ⚡️') ;
    return view('welcome');
});
Route::get('/test-mailable', function () {
    $user = User::first();
    $projet = Projet::first();
    Mail::to($projet->promoteur->user->email)->send(new ProjetStatutMail($projet, 'validé'));
    return '✅ Email envoyé avec PDF joint !';
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::resource('promoteurs', Admincontroller::class);
    Route::resource('promoteurs', PromoteurController::class);
    Route::resource('projets', projetController::class);
    route::resource('gestionnaires', GestionnaireController::class);
    Route::get('/dashboard/gestionnaire', [GestionnaireController::class, 'dashboard'])->name('gestionnaire.dashboard');
    Route::get('/dashboard/promoteur', [PromoteurController::class, 'dashboard'])->name('promoteur.dashboard');
    Route::get('/dashboard/admin', [Admincontroller::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/projets/{projet}/valider', [projetController::class, 'valider'])->name('projets.valider');
    Route::post('/projets/{projet}/rejeter', [projetController::class, 'rejeter'])->name('projets.rejeter');

});











require __DIR__.'/auth.php';
