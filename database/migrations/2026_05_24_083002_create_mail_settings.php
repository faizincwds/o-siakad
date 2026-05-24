<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mail.mailer', 'smtp');
        $this->migrator->add('mail.host', 'smtp.gmail.com');
        $this->migrator->add('mail.port', 587);
        $this->migrator->add('mail.username', 'admin@kampus.ac.id');
        $this->migrator->add('mail.password', '');
        $this->migrator->add('mail.encryption', 'tls');
        $this->migrator->add('mail.from_address', 'admin@kampus.ac.id');
        $this->migrator->add('mail.from_name', 'e-SIAKAD');
    }
};
