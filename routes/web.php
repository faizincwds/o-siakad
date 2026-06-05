<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('settings')
    ->name('settings.')
    ->controller(SettingController::class)
    ->group(function () {

        Route::get('/', 'index')->name('index');
        Route::post('/', 'update')->name('update');

        Route::get('/roles', 'roles')->name('roles');

        Route::get('/profile', 'profile')->name('profile');

        Route::get('/icons', 'icons')->name('icons');

        Route::get('/mail', 'mail')->name('mail');
        Route::post('/mail', 'updateMail')->name('mail.update');

        Route::get('/notification', 'notification')->name('notification');
        Route::post('/notification', 'updateNotification')->name('notification.update');

        Route::get('/backup', 'backup')->name('backup');
        Route::post('/backup', 'updateBackup')->name('backup.update');

        Route::get('/security', 'security')->name('security');
        Route::post('/security', 'updateSecurity')->name('security.update');

        Route::post('/reset', 'reset')->name('reset');
    });


Route::post('/import', [MahasiswaController::class, 'import'])->name('import');
