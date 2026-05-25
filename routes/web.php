<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::controller(SettingController::class)->group(function () {
    Route::get('/settings', 'index')->name('settings.index');
    Route::post('/settings', 'update')->name('settings.update');
    Route::get('/settings/mail', 'mail')->name('settings.mail');
    Route::post('/settings/mail', 'updateMail')->name('settings.updateMail');
    Route::get('/settings/notification', 'notification')->name('settings.notification');
    Route::post('/settings/notification', 'updateNotification')->name('settings.updateNotification');
    Route::get('/settings/backup', 'backup')->name('settings.backup');
    Route::post('/settings/backup', 'updateBackup')->name('settings.updateBackup');
    Route::get('/settings/security', 'security')->name('settings.security');
    Route::post('/settings/security', 'updateSecurity')->name('settings.updateSecurity');
    Route::post('/settings/reset', 'reset')->name('settings.reset');
});

// Dashboard & Profil
Route::get('/', function(){
    return view('home');
})->name('dashboard');

Route::post('/import', [MahasiswaController::class, 'import'])
    ->name('import');
