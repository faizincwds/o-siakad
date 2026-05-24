<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.nama_aplikasi', 'e-SIAKAD');
        $this->migrator->add('general.nama_kampus', 'STITUSA');
        $this->migrator->add('general.email', 'admin@kampus.ac.id');
        $this->migrator->add('general.telepon', '08123456789');
        $this->migrator->add('general.alamat', 'Banjarnegara');
        $this->migrator->add('general.maintenance_mode', false);
    }
};
