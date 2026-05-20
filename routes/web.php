<?php

use Illuminate\Support\Facades\Route;

// Dashboard & Profil
    Route::get('/', function(){
        return view('home');
    });
