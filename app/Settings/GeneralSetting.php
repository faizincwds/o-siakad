<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSetting extends Settings
{
    public string $app_name;

    public static function group(): string
    {
        return 'default';
    }
}
