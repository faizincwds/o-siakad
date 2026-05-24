<?php

// use Illuminate\Console\Scheduling\Schedule;
use App\Settings\BackupSettings;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function () {

    $backup = app(BackupSettings::class);

    if ($backup->backup_active) {
        Artisan::call('backup:run');
    }

})
->dailyAt('01:00')
->name('backup_run')
->withoutOverlapping();

Schedule::call(function () {

    $backup = app(BackupSettings::class);

    if ($backup->backup_active) {
        Artisan::call('backup:clean');
    }

})
->dailyAt('02:00')
->name('backup_clean');

Schedule::command('generate:sitemap')
    ->daily()
    ->name('Generate_Sitemap')
    ->withoutOverlapping()
    ->runInBackground();

// Schedule::command('queue:restart')
//     ->daily()
//     ->name('Queue_Restart');
