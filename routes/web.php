<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::inertia('/','Home')->name('home');

Route::inertia('/about','About',['name' => "Sam Samim"])->name('about');