<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'auth')->name('auth.store');
});

Route::get('logout', [LogoutController::class, 'perform'])->name('logout.perform');

Route::controller(RegisterController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'auth')->name('register.store');
});
