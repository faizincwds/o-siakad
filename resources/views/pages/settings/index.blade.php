@extends('layouts.app')

@section('title', 'Pengaturan Sistem')

@section('content')

<div
    x-data="{ tab: 'identitas' }"
    class="space-y-5"
>

    <div class="bg-card border border-card-border rounded-xl overflow-hidden">

        <div class="flex flex-col lg:flex-row">

            {{-- SIDEBAR TAB --}}
            <div
                class="w-full lg:w-72 text-sm font-semibold border-b lg:border-b-0 lg:border-r border-card-border bg-white dark:bg-surface"
            >

                <div class="p-3 space-y-1">

                    <button @click="tab='identitas'"
                        :class="tab==='identitas' ? 'bg-brand-500 text-white' : ''"
                        class="w-full text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">school</span>
                        Identitas PT
                    </button>

                    <button @click="tab='akun'"
                        :class="tab==='akun' ? 'bg-brand-500 text-white' : ''"
                        class="w-full text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">person</span>
                        Akun Pengguna
                    </button>

                    <button @click="tab='password'"
                        :class="tab==='password' ? 'bg-brand-500 text-white' : ''"
                        class="w-full text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">lock</span>
                        Password
                    </button>

                    <button @click="tab='smtp'"
                        :class="tab==='smtp' ? 'bg-brand-500 text-white' : ''"
                        class="w-full text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">mail</span>
                        SMTP Email
                    </button>

                    <button @click="tab='branding'"
                        :class="tab==='branding' ? 'bg-brand-500 text-white' : ''"
                        class="w-full text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">palette</span>
                        Logo & Branding
                    </button>

                    <button @click="tab='feeder'"
                        :class="tab==='feeder' ? 'bg-brand-500 text-white' : ''"
                        class="w-full text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">sync</span>
                        Neo Feeder
                    </button>

                    <button @click="tab='wa'"
                        :class="tab==='wa' ? 'bg-brand-500 text-white' : ''"
                        class="w-full text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">chat</span>
                        WhatsApp Gateway
                    </button>

                    <button @click="tab='backup'"
                        :class="tab==='backup' ? 'bg-brand-500 text-white' : ''"
                        class="w-full text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">backup</span>
                        Backup Database
                    </button>

                    <button @click="tab='api'"
                        :class="tab==='api' ? 'bg-brand-500 text-white' : ''"
                        class="w-full text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">api</span>
                        API Settings
                    </button>

                </div>
            </div>

            {{-- CONTENT --}}
            <div class="flex-1 p-6">

                {{-- IDENTITAS --}}
                <div x-show="tab==='identitas'" x-cloak>

                    <div class="space-y-4">

                        <x-input.input
                            name="nama_pt"
                            icon="school"
                            label="Nama Perguruan Tinggi"
                            value="STIT Tunas Bangsa"
                        />

                        <x-input.input
                            name="npsn"
                            label="NPSN"
                            icon="badge"
                        />

                        <x-input.input
                            name="email"
                            label="Email"
                            icon="email"
                        />

                        <x-input.textarea
                            name="alamat"
                            label="Alamat"
                            icon="location_on"
                        />

                    </div>

                    <div class="mt-5">
                        <x-button.button
                            type="submit"
                            icon="save">
                            Simpan
                        </x-button.button>
                    </div>

                </div>

                {{-- AKUN --}}
                <div x-show="tab==='akun'" x-cloak>

                    <div class="space-y-4">

                        <x-input.input
                            name="username"
                            label="Username"
                            icon="person"
                        />

                        <x-input.input
                            name="nama"
                            label="Nama Lengkap"
                            icon="badge"
                        />

                        <x-input.input
                            type="email"
                            name="email_user"
                            label="Email"
                            icon="alternate_email"
                        />

                    </div>
                    <div class="mt-5">
                        <x-button.button
                            variant="success"
                            icon="save">
                            Simpan
                        </x-button.button>
                    </div>

                </div>

                {{-- PASSWORD --}}
                <div x-show="tab==='password'" x-cloak>

                    <div class="space-y-4">

                        <x-input.input
                            type="password"
                            name="password_lama"
                            label="Password Lama"
                            icon="lock"
                        />

                        <x-input.input
                            type="password"
                            name="password_baru"
                            label="Password Baru"
                            icon="vpn_key"
                        />

                        <x-input.input
                            type="password"
                            name="password_konfirmasi"
                            label="Konfirmasi Password"
                            icon="verified_user"
                        />

                    </div>
                    <div class="mt-5">
                        <x-button.button
                            variant="success"
                            icon="save">
                            Simpan
                        </x-button.button>
                    </div>

                </div>

                {{-- SMTP --}}
                <div x-show="tab==='smtp'" x-cloak>

                    <div class="grid md:grid-cols-2 gap-4">

                        <x-input.input
                            name="smtp_host"
                            label="SMTP Host"
                            icon="dns"
                        />

                        <x-input.input
                            name="smtp_port"
                            label="SMTP Port"
                            icon="settings_ethernet"
                        />

                        <x-input.input
                            name="smtp_username"
                            label="Username"
                            icon="person"
                        />

                        <x-input.input
                            name="smtp_password"
                            type="password"
                            label="Password"
                            icon="lock"
                        />

                        <x-input.input
                            name="smtp_encryption"
                            label="Encryption"
                            icon="security"
                        />

                    </div>
                    <div class="mt-5">
                        <x-button.button
                            variant="success"
                            icon="save">
                            Simpan
                        </x-button.button>
                    </div>

                </div>

                {{-- BRANDING --}}
                <div x-show="tab==='branding'" x-cloak>

                    <div class="space-y-4">

                        <x-input.file
                            name="logo"
                            label="Logo Kampus"
                            icon="image"
                        />

                        <x-input.file
                            name="favicon"
                            label="Favicon"
                            icon="web_asset"
                        />

                        <x-input.input
                            type="color"
                            name="primary_color"
                            label="Warna Utama"
                            icon="palette"
                        />

                    </div>
                    <div class="mt-5">
                        <x-button.button
                            variant="success"
                            icon="save">
                            Simpan
                        </x-button.button>
                    </div>

                </div>

                {{-- FEEDER --}}
                <div x-show="tab==='feeder'" x-cloak>

                    <div class="space-y-4">

                        <x-input.input
                            name="feeder_url"
                            label="URL Neo Feeder"
                            icon="link"
                        />

                        <x-input.input
                            name="feeder_username"
                            label="Username"
                            icon="person"
                        />

                        <x-input.input
                            type="password"
                            name="feeder_password"
                            label="Password"
                            icon="lock"
                        />

                    </div>
                    <div class="mt-5">
                        <x-button.button
                            variant="success"
                            icon="save">
                            Simpan
                        </x-button.button>
                    </div>

                </div>

                {{-- WA --}}
                <div x-show="tab==='wa'" x-cloak>

                    <div class="space-y-4">

                        <x-input.input
                            name="wa_url"
                            label="Server URL"
                            icon="hub"
                        />

                        <x-input.input
                            name="wa_token"
                            label="API Token"
                            icon="key"
                        />

                        <x-input.phone
                            name="wa_admin"
                            label="Nomor Admin"
                            icon="call"
                        />

                    </div>
                    <div class="mt-5">
                        <x-button.button
                            variant="success"
                            icon="save">
                            Simpan
                        </x-button.button>
                    </div>

                </div>

                {{-- BACKUP --}}
                <div x-show="tab==='backup'" x-cloak>

                    <div class="space-y-4">

                        <x-input.select
                            name="backup_driver"
                            label="Storage"
                            icon="storage"
                            :options="[
                                'local' => 'Local',
                                's3' => 'Amazon S3'
                            ]"
                        />

                        <x-input.input
                            name="backup_path"
                            label="Path Backup"
                            icon="folder"
                        />

                    </div>

                    <div class="mt-5">
                        <x-button.button
                            variant="success"
                            icon="backup">
                            Backup Sekarang
                        </x-button.button>
                    </div>

                </div>

                {{-- API --}}
                <div x-show="tab==='api'" x-cloak>

                    <div class="space-y-4">

                        <x-input.input
                            name="api_key"
                            label="API Key"
                            icon="key"
                        />

                        <x-input.input
                            name="api_secret"
                            label="API Secret"
                            icon="vpn_key"
                        />

                    </div>
                    <div class="mt-5">
                        <x-button.button
                            variant="success"
                            icon="save">
                            Simpan
                        </x-button.button>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection