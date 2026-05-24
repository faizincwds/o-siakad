<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class NotificationSettings extends Settings
{

    public bool $email_notification;

    public bool $whatsapp_notification;

    public bool $telegram_notification;

    public bool $push_notification;

    public bool $academic_notification;

    public bool $payment_notification;

    public bool $attendance_notification;

    public string $telegram_bot_token;

    public string $telegram_chat_id;

    public static function group(): string
    {
        return 'notification';
    }
}
