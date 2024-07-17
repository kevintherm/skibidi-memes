<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::view('/', 'home')
    ->name('home');

Route::view('/about', 'about');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('/memes/create', 'memes.create')
        ->name('memes.create');

    Route::resource('memes', MemeController::class)
        ->only(['store']);

    Route::view('profile', 'profile')->name('profile');
    Route::view('profile/edit', 'profile.edit-detail')
        ->name('profile.edit');
    Route::view('profile/edit/password', 'profile.edit-password')
        ->name('profile.edit.password');
    Route::put('profile/edit', [ProfileController::class, 'update']);
    Route::put('profile/edit/password', [ProfileController::class, 'updatePassword']);
    Route::put('profile/edit/image', [ProfileController::class, 'updateImage'])
        ->name('profile.edit.image');
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

Route::get('/{user:username}', [UserController::class, 'show'])
    ->name('user.show');
