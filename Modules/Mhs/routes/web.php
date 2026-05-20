<?php

use Illuminate\Support\Facades\Route;
use Modules\Mhs\Http\Controllers\MhsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('mhs', MhsController::class)->names('mhs');
});
