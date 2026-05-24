<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('backup.backup_active', true);
        $this->migrator->add('backup.backup_disk', 'local');
        $this->migrator->add('backup.backup_time', '00:00');
        $this->migrator->add('backup.backup_keep_days', 30);

        $this->migrator->add('backup.backup_database', true);
        $this->migrator->add('backup.backup_storage', true);
        $this->migrator->add('backup.backup_notification', true);
        $this->migrator->add('backup.backup_compress', true);
    }
};
