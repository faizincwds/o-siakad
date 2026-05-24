<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class BackupSettings extends Settings
{

    public bool $backup_active;

    public string $backup_disk;

    public string $backup_time;

    public int $backup_keep_days;

    public bool $backup_database;

    public bool $backup_storage;

    public bool $backup_notification;

    public bool $backup_compress;

    public static function group(): string
    {
        return 'backup';
    }
}
