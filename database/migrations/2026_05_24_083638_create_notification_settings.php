<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('notification.email_notification', true);
        $this->migrator->add('notification.whatsapp_notification', false);
        $this->migrator->add('notification.telegram_notification', false);
        $this->migrator->add('notification.push_notification', true);
        $this->migrator->add('notification.academic_notification', true);
        $this->migrator->add('notification.payment_notification', true);
        $this->migrator->add('notification.attendance_notification', true);
        $this->migrator->add('notification.telegram_bot_token', '');
        $this->migrator->add('notification.telegram_chat_id', '');
    }
};
