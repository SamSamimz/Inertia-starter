<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::middleware('auth')->group(function () {
    Route::inertia('/','Home')->name('home');

    Route::get('/users', function(Request $request) {
        return inertia('Users', [
        'users' => User::when($request->search, function($query) use ($request) {
            $query->where('name', 'LIKE', '%'.$request->search.'%')
                ->orWhere('email', 'LIKE' , '%'.$request->search.'%');
            })->paginate(5)->withQueryString(),
            'searchTerm' => $request->search
        ]);
    })->name('users');

    Route::inertia('/about','About')->name('about');
    Route::post('/logout',LogoutController::class)->name('logout');
    Route::delete('/delete/{id}', function($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return to_route('home')->with('success','User deleted!');
    })->name('delete');
    Route::inertia('/chart','Chart',[
        'chartData' => [
            'labels' => [
                "January", "February", "March", "April", "May", "June",
                "July", "August", "September", "October", "November", "December"
            ],
            'datasets' => [
                [
                    'label' => 'Example Dataset',
                    'data' => [20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 130],
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ],
    ])->name('chart');
});
Route::middleware('guest')->group(function () {
    Route::inertia('/login','Auth/Login')->name('login');
    Route::post('/login',LoginController::class);
    Route::inertia('/register','Auth/Register')->name('register');
    Route::post('/register',RegisterController::class);
});