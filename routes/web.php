<?php

use App\Http\Controllers\Admin\ProjetControler;
use App\Http\Controllers\Admin\ProjetController;
use App\Http\Controllers\AuthControlle;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

    route::prefix('admin')->name('admin.')->group(function () {
        route::resource('projets', ProjetController::class);
        });
    Route::get('/signup',[AuthControlle::class,'showSignUp'])->name('signup');
    Route::post('/signup',[AuthControlle::class,'signUp'])->name('tosignup');
    Route::get('/login',[AuthControlle::class,'showforlogin'])->name('login');
    Route::post('/login',[AuthControlle::class,'login'])->name('tologin');
    Route::post('/logout',[AuthControlle::class,'logout'])->name('logout');


