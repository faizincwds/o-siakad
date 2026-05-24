<?php

namespace App\Http\Controllers;

use App\Helpers\MenuHelper;
use App\Settings\BackupSettings;
use App\Settings\GeneralSettings;
use App\Settings\MailSettings;
use App\Settings\NotificationSettings;
use App\Settings\SecuritySettings;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(GeneralSettings $settings)
    {
        $meta = MenuHelper::meta();

        return view('page.settings.index', compact('meta'));
    }

    public function update(Request $request, GeneralSettings $settings)
    {
        $settings->nama_aplikasi = $request->input('nama_aplikasi');
        $settings->nama_kampus = $request->input('nama_kampus');
        $settings->email = $request->input('email');
        $settings->telepon = $request->input('telepon');
        $settings->alamat = $request->input('alamat');
        $settings->maintenance_mode = $request->input('maintenance_mode');
        $settings->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui.');
    }

    public function mail(MailSettings $settings)
    {
        dd($settings->mailer);
    }

    public function updateMail(Request $request, MailSettings $mail)
    {
        $mail->mailer = $request->input('mailer');
        $mail->host = $request->input('host');
        $mail->port = $request->input('port');
        $mail->username = $request->input('username');
        $mail->password = $request->input('password');
        $mail->encryption = $request->input('encryption');
        $mail->from_address = $request->input('from_address');
        $mail->from_name = $request->input('from_name');
        $mail->save();

        return redirect()->back()->with('success', 'Pengaturan email berhasil diperbarui.');
    }

    public function notification(NotificationSettings $notification )
    {
        if ($notification->email_notification) {
            // kirim email
        }
    }

    public function updateNotification(Request $request, NotificationSettings $notification )
    {
        $notification->email_notification = $request->input('email_notification');
        $notification->whatsapp_notification = $request->input('whatsapp_notification');
        $notification->telegram_notification = $request->input('telegram_notification');
        $notification->push_notification = $request->input('push_notification');
        $notification->academic_notification = $request->input('academic_notification');
        $notification->payment_notification = $request->input('payment_notification');
        $notification->attendance_notification = $request->input('attendance_notification');
        $notification->telegram_bot_token = $request->input('telegram_bot_token');
        $notification->telegram_chat_id = $request->input('telegram_chat_id');
        $notification->save();

        return redirect()->back()->with('success', 'Pengaturan notifikasi berhasil diperbarui.');
    }

    public function backup(BackupSettings $backup)
    {
        dd($backup->backup_active);
    }

    public function updateBackup(Request $request, BackupSettings $backup)
    {
        $backup->backup_active = $request->input('backup_active');
        $backup->backup_disk = $request->input('backup_disk');
        $backup->backup_time = $request->input('backup_time');
        $backup->backup_keep_days = $request->input('backup_keep_days');
        $backup->backup_database = $request->input('backup_database');
        $backup->backup_storage = $request->input('backup_storage');
        $backup->backup_notification = $request->input('backup_notification');
        $backup->save();

        return redirect()->back()->with('success', 'Pengaturan backup berhasil diperbarui.');
    }

    public function security(SecuritySettings $security)
    {
        dd($security->maintenance_mode);
    }

    public function updateSecurity(Request $request, SecuritySettings $security)
    {
        $security->maintenance_mode = $request->input('maintenance_mode');
        $security->force_https = $request->input('force_https');
        $security->enable_2fa = $request->input('enable_2fa');
        $security->login_activity_log = $request->input('login_activity_log');
        $security->password_expired = $request->input('password_expired');
        $security->password_expired_days = $request->input('password_expired_days');
        $security->max_login_attempts = $request->input('max_login_attempts');
        $security->lockout_minutes = $request->input('lockout_minutes');
        $security->allow_registration = $request->input('allow_registration');
        $security->save();

        return redirect()->back()->with('success', 'Pengaturan keamanan berhasil diperbarui.');
    }




}
