@extends('layouts.app')

@section('title', 'Pengaturan Sistem')

@section('content')

<div
    x-data="{
        tab: localStorage.getItem('settings-tab') || 'identitas',
        setTab(name){
            this.tab = name
            localStorage.setItem('settings-tab', name)
        }
    }"
    class="space-y-5"
>

    <div class="bg-card border border-card-border rounded-xl overflow-hidden">

        <div class="flex flex-col lg:flex-row">

            {{-- SIDEBAR TAB --}}
            <div
                class="w-full lg:w-72 text-sm font-semibold border-b lg:border-b-0 lg:border-r border-card-border bg-white dark:bg-surface"
            >

                <div class="p-3 space-y-1">

                    <button @click="setTab('identitas')"
                        :class="tab==='identitas' ? 'bg-brand-500 text-white hover:text-white' : ''"
                        class="w-full cursor-pointer hover:text-brand-600 text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">school</span>
                        Identitas PT
                    </button>

                    <button @click="setTab('akun')"
                        :class="tab==='akun' ? 'bg-brand-500 text-white hover:text-white' : ''"
                        class="w-full cursor-pointer hover:text-brand-600 text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">person</span>
                        Akun Pengguna
                    </button>

                    <button @click="setTab('password')"
                        :class="tab==='password' ? 'bg-brand-500 text-white hover:text-white' : ''"
                        class="w-full cursor-pointer hover:text-brand-600 text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">lock</span>
                        Password
                    </button>

                    <button @click="setTab('smtp')"
                        :class="tab==='smtp' ? 'bg-brand-500 text-white hover:text-white' : ''"
                        class="w-full cursor-pointer hover:text-brand-600 text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">mail</span>
                        SMTP Email
                    </button>

                    <button @click="setTab('branding')"
                        :class="tab==='branding' ? 'bg-brand-500 text-white hover:text-white' : ''"
                        class="w-full cursor-pointer hover:text-brand-600 text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">palette</span>
                        Logo & Branding
                    </button>

                    <button @click="setTab('feeder')"
                        :class="tab==='feeder' ? 'bg-brand-500 text-white hover:text-white' : ''"
                        class="w-full cursor-pointer hover:text-brand-600 text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">sync</span>
                        Neo Feeder
                    </button>

                    <button @click="setTab('wa')"
                        :class="tab==='wa' ? 'bg-brand-500 text-white hover:text-white' : ''"
                        class="w-full cursor-pointer hover:text-brand-600 text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">chat</span>
                        WhatsApp Gateway
                    </button>

                    <button @click="setTab('backup')"
                        :class="tab==='backup' ? 'bg-brand-500 text-white hover:text-white' : ''"
                        class="w-full cursor-pointer hover:text-brand-600 text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">backup</span>
                        Backup Database
                    </button>

                    <button @click="setTab('api')"
                        :class="tab==='api' ? 'bg-brand-500 text-white hover:text-white' : ''"
                        class="w-full cursor-pointer hover:text-brand-600 text-left px-4 py-3 rounded-lg flex items-center gap-2">
                        <span class="material-icons-outlined">api</span>
                        API Settings
                    </button>

                </div>
            </div>

            {{-- CONTENT ---}}
            <div class="flex-1 p-6">

                {{-- IDENTITAS --}}
                <div x-show="tab==='identitas'" x-cloak>

                    <div class="space-y-4">
                        <x-input.input name="nama_pt" icon="school"
                            label="Nama Perguruan Tinggi"
                            value="STIT Tunas Bangsa"
                        />
                        <x-input.input name="npsn" icon="badge" label="NSPN" value="0210250" />
                        <x-input.input name="akreditasi" icon="verified" label="Akreditasi" value="Unggul (SK BAN-PT No. 1234/SK/BAN-PT/Ak-PPJ/)" />
                        <x-input.input name="alamat" icon="location_on" label="Alamat" value="Jl. Pendidikan No. 45, Jakarta Selatan" />
                        <x-input.input name="kode_pos" icon="pin_drop" label="Kode Pos" value="12345" />
                        <x-input.input name="telepon" icon="phone" label="Telepon" value="(021) 7890-1234" />
                        <x-input.input name="fax" icon="print" label="Fax" value="(021) 7890-1235" />
                        <x-input.input name="website" icon="language" label="Website" value="www.unima.ac.id" />
                        <x-input.input name="email_pt" type="email" icon="email" label="Email" value="info@unima.ac.id" />
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
                        <div class="flex items-center gap-2.5 mb-3"><img src="https://picsum.photos/seed/neo-usr/80/80.jpg" class="w-12 h-12 rounded-xl object-cover"><div><div class="text-[12px] font-bold">Dr. Ahmad Fauzi, M.Kom.</div><div class="text-[10px]" style="color:var(--tx2)">Administrator</div></div></div>
                        <x-input.input name="username" label="Username" icon="person" value="admin" />
                        <x-input.input name="nama_lengkap" label="Nama Lengkap"  icon="badge" value="Dr. Ahmad Fauzi, M.Kom." />
                        <x-input.input name="email_user" type="email" label="Email" icon="email" value="ahmad.fauzi@unima.ac.id" />
                        <x-input.input name="role" label="Role" icon="verified" value="Administrator" readonly class="opacity-60 cursor-not-allowed" />
                        <x-input.input name="last_login" label="Terakhir Login" icon="access_time" value="05 Mei 2026, 07:30 WIB" readonly class="opacity-60 cursor-not-allowed" />

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
