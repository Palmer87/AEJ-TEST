<?php

use App\Http\Controllers\Admin\ProjetControler;
use App\Http\Controllers\Admin\ProjetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

    route::prefix('admin')->name('admin.')->group(function () {
        route::resource('projets', ProjetController::class);
        });


