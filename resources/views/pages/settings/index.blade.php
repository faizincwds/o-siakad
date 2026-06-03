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

    <div class="bg-card border border-card-border rounded-xl overflow-hidden shadow-sm">

        <div class="flex flex-col lg:flex-row min-h-150">

            {{-- SIDEBAR TAB --}}
            <div
                class="w-full lg:w-72 text-sm font-semibold border-b lg:border-b-0 lg:border-r border-card-border bg-white dark:bg-surface shrink-0"
            >
                <div class="p-4 space-y-1">
                    <div class="px-4 pb-2 text-xs uppercase text-gray-400 font-bold tracking-wider">Utama</div>

                    <button @click="setTab('identitas')"
                        :class="tab==='identitas' ? 'bg-brand-600 text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5'"
                        class="w-full text-left px-4 py-2 cursor-pointer rounded-md flex items-center gap-3 transition-all duration-200">
                        <span class="material-icons-outlined icon-md">domain</span>
                        Identitas PT
                    </button>

                    <button @click="setTab('akun')"
                        :class="tab==='akun' ? 'bg-brand-600 text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5'"
                        class="w-full text-left px-4 py-2 cursor-pointer rounded-md flex items-center gap-3 transition-all duration-200">
                        <span class="material-icons-outlined icon-md">admin_panel_settings</span>
                        Profil Admin
                    </button>

                    <div class="px-4 pt-4 pb-2 text-xs uppercase text-gray-400 font-bold tracking-wider">Keamanan</div>

                    <button @click="setTab('password')"
                        :class="tab==='password' ? 'bg-brand-600 text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5'"
                        class="w-full text-left px-4 py-2 cursor-pointer rounded-md flex items-center gap-3 transition-all duration-200">
                        <span class="material-icons-outlined icon-md">lock</span>
                        Password
                    </button>

                    <div class="px-4 pt-4 pb-2 text-xs uppercase text-gray-400 font-bold tracking-wider">Integrasi</div>

                    <button @click="setTab('smtp')"
                        :class="tab==='smtp' ? 'bg-brand-600 text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5'"
                        class="w-full text-left px-4 py-2 cursor-pointer rounded-md flex items-center gap-3 transition-all duration-200">
                        <span class="material-icons-outlined icon-md">mail_lock</span>
                        Konfigurasi SMTP
                    </button>

                    <button @click="setTab('wa')"
                        :class="tab==='wa' ? 'bg-brand-600 text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5'"
                        class="w-full text-left px-4 py-2 cursor-pointer rounded-md flex items-center gap-3 transition-all duration-200">
                        <span class="material-icons-outlined icon-md">chat</span>
                        WhatsApp Gateway
                    </button>

                    <button @click="setTab('feeder')"
                        :class="tab==='feeder' ? 'bg-brand-600 text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5'"
                        class="w-full text-left px-4 py-2 cursor-pointer rounded-md flex items-center gap-3 transition-all duration-200">
                        <span class="material-icons-outlined icon-md">sync_alt</span>
                        Neo Feeder
                    </button>

                    <button @click="setTab('api')"
                        :class="tab==='api' ? 'bg-brand-600 text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5'"
                        class="w-full text-left px-4 py-2 cursor-pointer rounded-md flex items-center gap-3 transition-all duration-200">
                        <span class="material-icons-outlined icon-md">api</span>
                        Akses API
                    </button>

                    <div class="px-4 pt-4 pb-2 text-xs uppercase text-gray-400 font-bold tracking-wider">Lainnya</div>

                    <button @click="setTab('branding')"
                        :class="tab==='branding' ? 'bg-brand-600 text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5'"
                        class="w-full text-left px-4 py-2 cursor-pointer rounded-md flex items-center gap-3 transition-all duration-200">
                        <span class="material-icons-outlined icon-md">palette</span>
                        Tampilan
                    </button>

                    <button @click="setTab('backup')"
                        :class="tab==='backup' ? 'bg-brand-600 text-white' : 'text-gray-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-white/5'"
                        class="w-full text-left px-4 py-2 cursor-pointer rounded-md flex items-center gap-3 transition-all duration-200">
                        <span class="material-icons-outlined icon-md">backup</span>
                        Backup Database
                    </button>
                </div>
            </div>

            {{-- CONTENT ---}}
            <div class="flex-1 p-6 lg:p-10 bg-gray-50/50 dark:bg-surface/50 overflow-y-auto">

                {{-- IDENTITAS --}}
                <div x-show="tab==='identitas'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Identitas Perguruan Tinggi</h3>
                    <p class="text-sm text-gray-500 mb-6 dark:text-gray-400">Kelola data dasar kampus yang akan tampil pada sistem dan surat resmi.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="nama_pt" icon="apartment" label="Nama Perguruan Tinggi" value="STIT Tunas Bangsa" required />
                            <x-input.input name="npsn" icon="badge" label="NPSN" value="0210250" required />
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="nama_rektor" icon="person_4" label="Ketua/Pimpinan" value="Dr. H. Abdullah, M.Pd" />
                            <x-input.input name="akreditasi" icon="verified" label="Akreditasi Institusi" value="Unggul (No. 1234/SK/BAN-PT/)" />
                        </div>

                        <x-input.input name="alamat" icon="location_on" label="Alamat Lengkap" value="Jl. Pendidikan No. 45, Jakarta Selatan" />

                        <div class="grid md:grid-cols-3 gap-5">
                            <x-input.input name="provinsi" icon="map" label="Provinsi" value="DKI Jakarta" />
                            <x-input.input name="kota" icon="location_city" label="Kab/Kota" value="Jakarta Selatan" />
                            <x-input.input name="kode_pos" icon="pin_drop" label="Kode Pos" value="12345" />
                        </div>

                        <div class="grid md:grid-cols-3 gap-5">
                            <x-input.input name="telepon" icon="phone" label="No. Telepon" value="(021) 7890-1234" />
                            <x-input.input name="fax" icon="print" label="No. Fax" value="(021) 7890-1235" />
                            <x-input.input name="email_pt" type="email" icon="email" label="Email Resmi" value="info@unima.ac.id" />
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="website" icon="language" label="Website" value="www.unima.ac.id" />
                            <x-input.input name="google_maps_link" icon="add_road" label="Link Google Maps (Embed)" placeholder="https://maps.google.com/..." />
                        </div>

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 mt-6 flex justify-end">
                            <x-button.button type="submit" variant="brand" icon="save" size="sm">
                                Simpan Perubahan
                            </x-button.button>
                        </div>
                    </form>
                </div>

                {{-- AKUN --}}
                <div x-show="tab==='akun'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Profil Administrator</h3>
                    <p class="text-sm text-gray-500 mb-6 dark:text-gray-400">Kelola informasi akun super admin sistem.</p>

                    <form class="space-y-5">
                        <div class="flex items-center gap-4 p-4 bg-white dark:bg-surface rounded-xl border border-card-border shadow-sm">
                            <img src="https://picsum.photos/seed/admin-user/100/100.jpg" class="w-16 h-16 rounded-full object-cover border-2 border-brand-100">
                            <div>
                                <div class="text-sm font-bold text-gray-900 dark:text-white">Dr. Ahmad Fauzi, M.Kom.</div>
                                <div class="text-xs text-brand-600 font-medium bg-brand-50 dark:bg-brand-900/30 px-2 py-1 rounded-md inline-block mt-1">Super Administrator</div>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="username" label="Username" icon="person" value="admin" readonly class="bg-gray-300 dark:bg-white/5" />
                            <x-input.input name="email_user" type="email" label="Email Administrator" icon="email" value="ahmad.fauzi@unima.ac.id" />
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="nama_lengkap" label="Nama Lengkap" icon="badge" value="Dr. Ahmad Fauzi, M.Kom." />
                            <x-input.phone name="no_hp_admin" label="Nomor HP / WhatsApp" icon="call" value="081234567890" />
                        </div>

                        <div class="grid md:grid-cols-2 gap-5 opacity-70 cursor-not-allowed">
                            <x-input.input name="role" label="Role Access" icon="admin_panel_settings" value="Administrator" readonly />
                            <x-input.input name="last_login" label="Terakhir Login" icon="access_time" value="05 Mei 2026, 07:30 WIB" readonly />
                        </div>

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 mt-6 flex justify-end">
                            <x-button.button variant="success" icon="save" size="sm">
                                Update Profil
                            </x-button.button>
                        </div>
                    </form>
                </div>

                {{-- PASSWORD --}}
                <div x-show="tab==='password'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Keamanan Password</h3>
                    <p class="text-sm text-gray-500 mb-6 dark:text-gray-400">Pastikan password Anda kuat dan terdiri dari kombinasi karakter.</p>

                    <form class="space-y-5">
                        <x-input.input type="password" name="password_lama" label="Password Saat Ini" icon="lock" required />

                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input type="password" name="password_baru" label="Password Baru" icon="vpn_key" required />
                            <x-input.input type="password" name="password_konfirmasi" label="Konfirmasi Password Baru" icon="verified_user" required />
                        </div>

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 mt-6 flex justify-end">
                            <x-button.button variant="brand" icon="lock_reset" size="sm">
                                Ganti Password
                            </x-button.button>
                        </div>
                    </form>
                </div>

                {{-- SMTP --}}
                <div x-show="tab==='smtp'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Pengaturan Mail Server</h3>
                    <p class="text-sm text-gray-500 mb-6 dark:text-gray-400">Konfigurasi SMTP untuk pengiriman notifikasi email sistem.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="smtp_host" label="SMTP Host" icon="dns" placeholder="smtp.gmail.com" />
                            <x-input.input name="smtp_port" label="SMTP Port" icon="settings_ethernet" placeholder="465" />
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="smtp_username" label="Username SMTP" icon="person" placeholder="email@domain.com" />
                            <x-input.input name="smtp_password" type="password" label="Password SMTP" icon="lock" />
                        </div>

                        <div class="p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-brand-800 rounded-lg mb-4">
                            <h4 class="text-xs font-bold text-brand-700 dark:text-brand-300 uppercase mb-3">Header Email (From)</h4>
                            <div class="grid md:grid-cols-2 gap-5">
                                <x-input.input name="mail_from_address" label="From Address" icon="mail" placeholder="no-reply@kampus.ac.id" />
                                <x-input.input name="mail_from_name" label="From Name" icon="label" placeholder="Sistem Akademik" />
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.select name="smtp_encryption" label="Enkripsi" icon="security" :options="[
                                'tls' => 'TLS',
                                'ssl' => 'SSL',
                                'none' => 'None'
                            ]" />
                            <x-input.input name="smtp_timeout" label="Timeout (detik)" icon="hourglass_empty" value="30" />
                        </div>

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 mt-6 flex justify-end gap-3">
                            <x-button.button variant="outline" icon="send" size="md">
                                Kirim Test Email
                            </x-button.button>
                            <x-button.button variant="success" icon="save" size="sm">
                                Simpan SMTP
                            </x-button.button>
                        </div>
                    </form>
                </div>

                {{-- BRANDING --}}
                <div x-show="tab==='branding'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Logo & Tampilan</h3>
                    <p class="text-sm text-gray-500 mb-6 dark:text-gray-400">Kustomisasi visual aplikasi sesuai identitas kampus.</p>

                    <form class="space-y-5">

                        <x-input.input name="app_name" label="Nama Aplikasi (Tab Browser)" icon="title" value="Sistem Informasi Akademik" />

                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.image-upload name="logo" label="Logo Aplikasi (Utama)" icon="image" accept="image/*" />
                            <x-input.image-upload name="logo_small" label="Logo Kecil (Favicon)" icon="web_asset" accept="image/png,image/x-icon" />
                        <x-input.image-upload name="login_bg" label="Background Halaman Login" icon="wallpaper" accept="image/*" />
                        </div>

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 mt-6 flex justify-end">
                            <x-button.button variant="success" icon="save" size="sm">
                                Terapkan Desain
                            </x-button.button>
                        </div>
                    </form>
                </div>

                {{-- FEEDER --}}
                <div x-show="tab==='feeder'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Integrasi Neo Feeder</h3>
                    <p class="text-sm text-gray-500 mb-6 dark:text-gray-400">Hubungkan sistem dengan PDDikti untuk sinkronisasi data.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="feeder_url" label="URL API Feeder" icon="link" placeholder="https://pddikti..." class="md:col-span-2" />
                            <x-input.select name="feeder_env" label="Environment" :options="[
                                'prod' => 'Produksi',
                                'dev' => 'Development/Sandbox'
                            ]" />
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="feeder_username" label="Username Feeder" icon="person" />
                            <x-input.input type="password" name="feeder_password" label="Password Feeder" icon="lock" />
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                             <x-input.input name="feeder_act" label="Aktor Login" icon="how_to_reg" placeholder="Contoh: mahasiswa,pt" />
                             <x-input.input name="feeder_token" label="Token (Auto/Manual)" icon="key" readonly class="opacity-60" />
                        </div>

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 mt-6 flex justify-end gap-3">
                            <x-button.button variant="outline" icon="sync" size="md">
                                Cek Koneksi
                            </x-button.button>
                            <x-button.button variant="success" icon="save" size="sm">
                                Simpan Konfigurasi
                            </x-button.button>
                        </div>
                    </form>
                </div>

                {{-- WA --}}
                <div x-show="tab==='wa'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">WhatsApp Gateway</h3>
                    <p class="text-sm text-gray-500 mb-6 dark:text-gray-400">Konfigurasi server WhatsApp untuk notifikasi broadcast.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="wa_url" label="Server URL" icon="hub" placeholder="https://wa.yourdomain.com" />
                            <x-input.input name="wa_token" label="API Token" icon="key" type="password" />
                        </div>

                        <x-input.phone name="wa_admin" label="Nomor Admin Sender" icon="call" placeholder="0812..." />

                        <x-input.textarea name="wa_template_welcome" label="Template Pesan Welcome" icon="message" placeholder="Halo {nama}, selamat datang di kampus..." rows="3" />

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 mt-6 flex justify-end">
                            <x-button.button variant="success" icon="save" size="sm">
                                Simpan Pengaturan
                            </x-button.button>
                        </div>
                    </form>
                </div>

                {{-- BACKUP --}}
                <div
                    x-show="tab==='backup'"
                    x-cloak x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2"
                    x-transition:enter-end="opacity-100 translate-y-0">

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Backup Maintenance</h3>
                    <p class="text-sm text-gray-500 mb-6 dark:text-gray-400">Pengaturan otomatisasi backup database.</p>

                    <div class="bg-white dark:bg-surface p-5 rounded-xl border border-card-border mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h5 class="font-bold mb-2 text-gray-800 dark:text-white">Backup Terakhir</h5>
                                <p class="text-sm text-gray-500 dark:text-gray-400">05 Mei 2026, 12:00 WIB</p>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">Sukses</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-brand-600 h-2.5 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.select name="backup_driver" label="Lokasi Penyimpanan" icon="storage" :options="[
                                'local' => 'Local Server',
                                's3' => 'Amazon S3',
                                'gdrive' => 'Google Drive'
                            ]" />
                            <x-input.select name="backup_schedule" label="Jadwal Otomatis" icon="schedule" :options="[
                                'daily' => 'Harian',
                                'weekly' => 'Mingguan',
                                'monthly' => 'Bulanan'
                            ]" />
                        </div>

                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="backup_path" label="Path Folder" icon="folder" placeholder="/storage/backups" />
                            <x-input.input name="backup_retention" label="Retensi (Jumlah File)" icon="delete_sweep" type="number" value="5" />
                        </div>

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 mt-6 flex justify-between">
                            <x-button.button variant="brand" icon="download" size="sm">
                                Backup Sekarang
                            </x-button.button>
                        </div>
                    </form>
                </div>

                {{-- API --}}
                <div x-show="tab==='api'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">

                    <h3 class="text-xl font-bold text-gray-800 dark:text-white mb-1">Pengaturan API Eksternal</h3>
                    <p class="text-sm text-gray-500 mb-6">Manajemen akses untuk integrasi pihak ketiga.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <div class="md:col-span-2">
                                <x-input.input name="api_key" label="API Key" icon="vpn_key" readonly value="sk-live-1234567890abcdef" class="bg-gray-50 dark:bg-white/5 font-mono text-sm">
                                    <button type="button" class="text-brand-600 hover:text-brand-700 font-medium text-xs ml-2">Regenerate</button>
                                </x-input.input>
                            </div>
                            <x-input.input name="api_secret" type="password" label="API Secret" icon="lock" />
                            <x-input.input name="api_rate_limit" label="Rate Limit (Req/Menit)" icon="speed" value="60" />
                        </div>

                        <x-input.textarea name="api_whitelist" label="IP Whitelist (Pisahkan dengan koma)" icon="security" placeholder="192.168.1.1, 127.0.0.1" rows="3" />

                        <div class="pt-4 border-t border-gray-200 dark:border-gray-700 mt-6 flex justify-end">
                            <x-button.button variant="success" icon="save" size="sm">
                                Simpan Konfigurasi API
                            </x-button.button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
