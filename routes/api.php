<?php

use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\ValidationController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;




Route::middleware(['auth'])->group(function () {
    Route::resource('apiprojets', ProjectController::class);
    Route::post('/apiprojects/{projet}/valider', [ValidationController::class, 'valider'])->name('projets.valider');
    Route::post('/apiprojects/{projet}/rejeter', [ValidationController::class, 'rejeter'])->name('projets.rejeter');
});
