<?php

use Modules\Dosen\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use Modules\Dosen\Http\Controllers\DosenController;

Route::middleware(['web'])
    ->prefix('dosen')
    ->name('data.')
    ->group(function () {
        Route::get('/', [DataController::class, 'index'])->name('index');
    });
