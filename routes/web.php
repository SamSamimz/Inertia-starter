<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/','Home')->name('home');

Route::inertia('/about','About',['name' => "Sam Samim"])->name('about');
Route::inertia('/login','Auth/Login')->name('login');
Route::inertia('/register','Auth/Register')->name('register');
Route::post('/register',RegisterController::class);