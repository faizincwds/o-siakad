<?php

use Illuminate\Support\Facades\Route;

Route::get('/maintenance', function(){
    return view('layouts.errors.maintenance');
})->name('maintenance');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot', function () {
    return view('auth.forgot-password');
})->name('forgot');
Route::get('/verify', function () {
    return view('auth.verification');
})->name('verify');
