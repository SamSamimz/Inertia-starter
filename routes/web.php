<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/','Home')->name('home')->middleware('auth');


Route::get('/users', function(Request $request) {
    return inertia('Users', [
        'users' => User::when($request->search, function($query) use ($request) {
            $query->where('name', 'LIKE', '%'.$request->search.'%');
        })->paginate(5)->withQueryString(),
        'searchTerm' => $request->search
    ]);
})->name('users')->middleware('auth');



Route::inertia('/about','About')->name('about');
Route::post('/logout',LogoutController::class)->name('logout')->middleware('auth');
Route::delete('/delete/{id}', function($id) {
    $user = User::findOrFail($id);
    $user->delete();
    return to_route('home')->with('success','User deleted!');
})->name('delete');
Route::middleware('guest')->group(function () {
    Route::inertia('/login','Auth/Login')->name('login');
    Route::post('/login',LoginController::class);
    Route::inertia('/register','Auth/Register')->name('register');
    Route::post('/register',RegisterController::class);
});