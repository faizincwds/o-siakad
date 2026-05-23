<?php

use Illuminate\Support\Facades\Route;

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
