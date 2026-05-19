<?php

use Illuminate\Support\Facades\Route;
use Modules\Mahasiswa\App\Http\Controllers\MahasiswaController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('mahasiswas', MahasiswaController::class)->names('mahasiswa');
});
