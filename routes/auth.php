<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get('/login', fn () => view('auth.login'))->name('login');
});

Route::middleware('web')->group(function () {
    Route::get('/register', fn () => view('auth.register'))->name('register');
});
Route::middleware('web')->group(function () {
    Route::get('/forgot', fn () => view('auth.forgot-password'))->name('forgot');
});
Route::middleware('web')->group(function () {
    Route::get('/verify', fn () => view('auth.verification'))->name('verify');
});

