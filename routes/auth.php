<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'guest'])->group(function () {
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
    Route::get('register', [RegisterController::class, 'show'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('forgot', [ForgotPasswordController::class, 'index'])->name('forgot');
    Route::post('forgot', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'index'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.store');
});

Route::middleware(['web', 'auth'])->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    Route::post('/update-password', [UpdatePasswordController::class, 'update'])->name('password.update');

    Route::get('/', function () {
        return view('pages.dashboard.index');
    })->name('dashboard');
});

Route::middleware(['web'])->group(function () {
    Route::get('/test', fn () => view('test'))->name('test');
    Route::get('/icon', fn () => view('test-icon'))->name('icon');
});


