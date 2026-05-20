<?php

use Illuminate\Support\Facades\Route;
use Modules\Mhs\Http\Controllers\MhsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('mhs', MhsController::class)->names('mhs');
});
