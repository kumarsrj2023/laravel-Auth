<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [UserController::class, 'showLoginPage' ])->name('user.showLoginPage');
Route::get('/register', [UserController::class, 'showRegisterPage' ])->name('user.showRegisterPage');
Route::post('/registerUser', [UserController::class, 'register' ])->name('user.register');
Route::post('/loginUser', [UserController::class, 'login' ])->name('user.login');
