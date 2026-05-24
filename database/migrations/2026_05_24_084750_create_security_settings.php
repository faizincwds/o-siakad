<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('security.maintenance_mode', false);

        $this->migrator->add('security.force_https', false);

        $this->migrator->add('security.enable_2fa', false);

        $this->migrator->add('security.login_activity_log', true);

        $this->migrator->add('security.password_expired', false);

        $this->migrator->add('security.password_expired_days', 90);

        $this->migrator->add('security.max_login_attempts', 5);

        $this->migrator->add('security.lockout_minutes', 15);

        $this->migrator->add('security.allow_registration', true);
    }
};
