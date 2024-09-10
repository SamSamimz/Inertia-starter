<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/','Home')->name('home')->middleware('auth');
Route::inertia('/users', 'Users',['users' => User::paginate(5)])->name('users')->middleware('auth');
Route::inertia('/about','About')->name('about');
Route::post('/logout',LogoutController::class)->name('logout')->middleware('auth');
Route::delete('/delete/{id}', function($id) {
    dd($id);
})->name('delete');
Route::middleware('guest')->group(function () {
    Route::inertia('/login','Auth/Login')->name('login');
    Route::post('/login',LoginController::class);
    Route::inertia('/register','Auth/Register')->name('register');
    Route::post('/register',RegisterController::class);
});