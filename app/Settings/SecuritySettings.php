<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SecuritySettings extends Settings
{

    public bool $maintenance_mode;

    public bool $force_https;

    public bool $enable_2fa;

    public bool $login_activity_log;

    public bool $password_expired;

    public int $password_expired_days;

    public int $max_login_attempts;

    public int $lockout_minutes;

    public bool $allow_registration;

    public static function group(): string
    {
        return 'security';
    }
}
