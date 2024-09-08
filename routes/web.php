<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/','Home')->name('home')->middleware('auth');

Route::inertia('/about','About',['name' => "Sam Samim"])->name('about');
Route::middleware('guest')->group(function () {
    Route::inertia('/login','Auth/Login')->name('login');
    Route::post('/login',LoginController::class);
    Route::inertia('/register','Auth/Register')->name('register');
    Route::post('/register',RegisterController::class);
});