<?php

// use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
// use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Schedule::command('backup:run')
//     ->dailyAt('01:00')
//     ->monitorName('Daily_Backup');

// Schedule::command('backup:clean')
//     ->dailyAt('02:00')
//     ->monitorName('Backup_Cleanup');

// Schedule::command('generate:sitemap')
//     ->daily()
//     ->monitorName('Generate_Sitemap');

// Schedule::command('queue:restart')
//     ->daily()
//     ->monitorName('Queue_Restart');
