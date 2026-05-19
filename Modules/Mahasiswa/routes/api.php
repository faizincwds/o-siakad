<?php

use Illuminate\Support\Facades\Route;
use Modules\Mahasiswa\App\Http\Controllers\MahasiswaController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('mahasiswas', MahasiswaController::class)->names('mahasiswa');
});
