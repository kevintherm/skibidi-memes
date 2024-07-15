<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemeController;

Route::view('/', 'home')
    ->name('home');

Route::view('/about', 'about');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('/memes/create', 'memes.create')
        ->name('memes.create');

    Route::resource('memes', MemeController::class)
        ->only(['store']);

    Route::view('profile', 'profile')->name('profile');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'attemptLogin'])
        ->name('login.attempt');

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'storeRegister'])
        ->name('register.store');
});

Route::delete('/logout', [AuthController::class, 'logout'])
    ->name('logout');
