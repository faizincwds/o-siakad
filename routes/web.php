<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// Dashboard & Profil
Route::get('/', function(){
    return view('home');
});

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

Route::post('/import', [MahasiswaController::class, 'import'])
    ->name('import');