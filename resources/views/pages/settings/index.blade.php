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

    <div class="bg-card border border-card-border rounded-xl overflow-hidden shadow-xs">

        <div class="flex flex-col lg:flex-row min-h-160">

            {{-- SIDEBAR TAB --}}
            <div class="w-full lg:w-68 text-sm font-semibold border-b lg:border-b-0 lg:border-r border-card-border bg-surface/20 dark:bg-surface/5 shrink-0">
                <div class="p-3 space-y-0.5">

                    <div class="px-3 pt-3 pb-1.5 text-[10px] uppercase text-gray-400 dark:text-gray-500 font-bold tracking-wider">Utama</div>

                    <button @click="setTab('identitas')"
                        :class="tab==='identitas' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='identitas' ? 'text-white' : 'text-muted'">domain</span>
                        <span class="font-medium tracking-wide">Identitas PT</span>
                    </button>

                    <button @click="setTab('akun')"
                        :class="tab==='akun' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='akun' ? 'text-white' : 'text-muted'">admin_panel_settings</span>
                        <span class="font-medium tracking-wide">Profil Admin</span>
                    </button>

                    <button @click="setTab('periode')"
                        :class="tab==='periode' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='periode' ? 'text-white' : 'text-muted'">calendar_month</span>
                        <span class="font-medium tracking-wide">Tahun Akademik</span>
                    </button>

                    <div class="px-3 pt-4 pb-1.5 text-[10px] uppercase text-gray-400 dark:text-gray-500 font-bold tracking-wider">Keamanan</div>

                    <button @click="setTab('password')"
                        :class="tab==='password' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='password' ? 'text-white' : 'text-muted'">lock</span>
                        <span class="font-medium tracking-wide">Password</span>
                    </button>

                    <div class="px-3 pt-4 pb-1.5 text-[10px] uppercase text-gray-400 dark:text-gray-500 font-bold tracking-wider">Advanced Settings</div>

                    <button @click="setTab('grading')"
                        :class="tab==='grading' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='grading' ? 'text-white' : 'text-muted'">pin</span>
                        <span class="font-medium tracking-wide">Skala Nilai Kelulusan</span>
                    </button>

                    <button @click="setTab('sessions')"
                        :class="tab==='sessions' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='sessions' ? 'text-white' : 'text-muted'">devices</span>
                        <span class="font-medium tracking-wide">Log Sesi Perangkat</span>
                    </button>

                    <div class="px-3 pt-4 pb-1.5 text-[10px] uppercase text-gray-400 dark:text-gray-500 font-bold tracking-wider">Integrasi</div>

                    <button @click="setTab('smtp')"
                        :class="tab==='smtp' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='smtp' ? 'text-white' : 'text-muted'">mail_lock</span>
                        <span class="font-medium tracking-wide">Konfigurasi SMTP</span>
                    </button>

                    <button @click="setTab('wa')"
                        :class="tab==='wa' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='wa' ? 'text-white' : 'text-muted'">chat</span>
                        <span class="font-medium tracking-wide">WhatsApp Gateway</span>
                    </button>

                    <button @click="setTab('feeder')"
                        :class="tab==='feeder' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='feeder' ? 'text-white' : 'text-muted'">sync_alt</span>
                        <span class="font-medium tracking-wide">Neo Feeder</span>
                    </button>

                    <button @click="setTab('api')"
                        :class="tab==='api' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='api' ? 'text-white' : 'text-muted'">api</span>
                        <span class="font-medium tracking-wide">Akses API</span>
                    </button>

                    <div class="px-3 pt-4 pb-1.5 text-[10px] uppercase text-gray-400 dark:text-gray-500 font-bold tracking-wider">Lainnya</div>

                    <button @click="setTab('branding')"
                        :class="tab==='branding' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='branding' ? 'text-white' : 'text-muted'">palette</span>
                        <span class="font-medium tracking-wide">Tampilan</span>
                    </button>

                    <button @click="setTab('backup')"
                        :class="tab==='backup' ? 'bg-brand-600 text-white shadow-xs' : 'text-foreground hover:bg-surface dark:hover:bg-white/5'"
                        class="w-full text-left px-3 py-2.5 cursor-pointer rounded-lg flex items-center gap-3 transition-all duration-150 select-none">
                        <span class="material-icons-outlined text-lg" :class="tab==='backup' ? 'text-white' : 'text-muted'">backup</span>
                        <span class="font-medium tracking-wide">Backup Database</span>
                    </button>
                </div>
            </div>

            {{-- CONTENT AREA --}}
            <div class="flex-1 p-6 lg:p-8 bg-transparent overflow-y-auto">

                {{-- IDENTITAS --}}
                <div x-show="tab==='identitas'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Identitas Perguruan Tinggi</h3>
                    <p class="text-xs text-muted mb-6">Kelola data dasar kampus yang akan tampil pada sistem dan surat resmi.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-3 gap-5">
                            <x-input.input name="nama_pt" icon="apartment" label="Nama PT" value="STIT Tunas Bangsa" required />
                            <x-input.input name="singkatan_pt" icon="pin_drop" label="Singkatan PT" value="STITUSA" required />
                            <x-input.input name="kategori" icon="category" label="Kategori" value="Sekolah Tinggi" required />
                        </div>
                        <div class="grid md:grid-cols-3 gap-5">
                            <x-input.input name="kode_pt" icon="badge" label="KODE PT" value="213622" required />
                            <x-input.input name="no_sk_pendirian" icon="badge" label="No SK Pendirian" value="Nomor: 3693 Tahun 2017" required />
                            <x-input.input name="tgl_sk_pendirian" type="date" icon="calendar_today" label="Tanggal SK Pendirian" value="2017-07-11" required />
                        </div>
                        <div class="grid md:grid-cols-3 gap-5">
                            <x-input.input name="akreditasi" icon="verified" label="Akreditasi Institusi" value="Baik" />
                            <x-input.input name="no_sk_akreditasi" icon="verified" label="No SK Akreditasi" value="No. 1234/SK/BAN-PT/2000" />
                            <x-input.input name="tgl_akreditasi" type="date" icon="calendar_today" label="Tanggal Akreditasi" value="2017-07-11" required />
                        </div>
                        <x-input.input name="alamat" icon="location_on" label="Alamat Lengkap" value="Jalan S. Parman No. 11 RT.001 RW. 07 Kel. Semarang Kecamatan Banjar Negara Kabup, Kab. Banjarnegara, Prov. Jawa Tengah" />
                        <div class="grid md:grid-cols-3 gap-5">
                            <x-input.input name="provinsi" icon="map" label="Provinsi" value="Jawa Tengah" />
                            <x-input.input name="kota" icon="location_city" label="Kab/Kota" value="Banjarnegara" />
                            <x-input.input name="kode_pos" icon="pin_drop" label="Kode Pos" value="53412" />
                        </div>
                        <div class="grid md:grid-cols-3 gap-5">
                            <x-input.input name="telepon" icon="phone" label="No. Telepon" value="(021) 7890-1234" />
                            <x-input.input name="fax" icon="print" label="No. Fax" value="(021) 7890-1235" />
                            <x-input.input name="email_pt" type="email" icon="email" label="Email Resmi" value="info@stitusa.ac.id" />
                        </div>
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="website" icon="language" label="Website" value="www.stitusa.ac.id" />
                            <x-input.input name="google_maps_link" icon="add_road" label="Link Google Maps (Embed)" placeholder="https://www.google.com/maps?q={$lat},{$lng}" />
                        </div>
                        <x-widget.google-maps title="Lokasi Kampus" query="STIT Tunas Bangsa Banjarnegara" />
                        <div class="pt-4 border-t border-card-border mt-6 flex justify-end">
                            <x-button.button type="submit" variant="brand" icon="save" size="sm">Simpan Perubahan</x-button.button>
                        </div>
                    </form>
                </div>

                {{-- AKUN --}}
                <div x-show="tab==='akun'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Profil Administrator</h3>
                    <p class="text-xs text-muted mb-6">Kelola informasi akun super admin sistem.</p>

                    <form class="space-y-5">
                        <div class="flex items-center gap-4 p-4 bg-card border border-card-border rounded-xl shadow-xs">
                            <img src="https://picsum.photos/seed/admin-user/100/100.jpg" class="w-14 h-14 rounded-full object-cover border-2 border-brand-100">
                            <div>
                                <div class="text-sm font-bold text-foreground">Dr. Ahmad Fauzi, M.Kom.</div>
                                <div class="text-sm text-brand-600 dark:text-brand-400 font-semibold bg-brand-50 dark:bg-brand-950/50 px-2 py-0.5 rounded-md inline-block mt-1">Super Administrator</div>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="username" label="Username" icon="person" value="admin" readonly/>
                            <x-input.input name="email_user" type="email" label="Email Administrator" icon="email" value="ahmad.fauzi@stitusa.ac.id" />
                        </div>
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="nama_lengkap" label="Nama Lengkap" icon="badge" value="Dr. Ahmad Fauzi, M.Kom." />
                            <x-input.phone name="no_hp_admin" label="Nomor HP / WhatsApp" icon="call" value="081234567890" />
                        </div>
                        <div class="grid md:grid-cols-2 gap-5 opacity-60">
                            <x-input.input name="role" label="Role Access" icon="admin_panel_settings" value="Administrator" readonly />
                            <x-input.input name="last_login" label="Terakhir Login" icon="access_time" value="2026-06-04 10:30 WIB" readonly />
                        </div>
                        <div class="pt-4 border-t border-card-border mt-6 flex justify-end">
                            <x-button.button variant="success" icon="save" size="sm">Update Profil</x-button.button>
                        </div>
                    </form>
                </div>

                {{-- PASSWORD --}}
                <div x-show="tab==='password'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Keamanan Password</h3>
                    <p class="text-xs text-muted mb-6">Pastikan password Anda kuat dan terdiri dari kombinasi karakter.</p>

                    <form class="space-y-5">
                        <x-input.password name="password_old" label="Password Saat Ini" icon="lock" />
                        <x-forms.password-field name="password_new" :generator="false" :copy="true" />
                        <div class="pt-4 border-t border-card-border mt-6 flex justify-end">
                            <x-button.button variant="brand" icon="lock_reset" size="sm">Ganti Password</x-button.button>
                        </div>
                    </form>
                    <div class="p-4 bg-yellow-50 dark:bg-yellow-950/20 border border-yellow-100 dark:border-yellow-900/30 rounded-xl mt-6">
                        <h4 class="text-xs font-bold text-yellow-800 dark:text-yellow-400 uppercase tracking-wider mb-2">Tips Membuat Password Kuat</h4>
                        <ul class="list-disc list-inside text-xs text-yellow-700 dark:text-yellow-300/90 space-y-1">
                            <li>Gunakan minimal 8 karakter dengan kombinasi huruf besar, kecil, angka, dan simbol.</li>
                            <li>Hindari penggunaan kata yang mudah ditebak.</li>
                        </ul>
                    </div>
                </div>

                {{-- SMTP --}}
                <div x-show="tab==='smtp'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Pengaturan Mail Server</h3>
                    <p class="text-xs text-muted mb-6">Konfigurasi SMTP untuk pengiriman notifikasi email sistem.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="smtp_host" label="SMTP Host" icon="dns" placeholder="smtp.gmail.com" />
                            <x-input.input name="smtp_port" label="SMTP Port" icon="settings_ethernet" placeholder="465" />
                        </div>
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="smtp_username" label="Username SMTP" icon="person" placeholder="email@domain.com" />
                            <x-input.input name="smtp_password" type="password" label="Password SMTP" icon="lock" />
                        </div>
                        <div class="p-4 bg-surface/40 border border-card-border rounded-xl">
                            <h4 class="text-xs font-bold text-muted uppercase tracking-wider mb-3">Header Email (From)</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <x-input.input name="mail_from_address" label="From Address" icon="mail" placeholder="no-reply@kampus.ac.id" />
                                <x-input.input name="mail_from_name" label="From Name" icon="label" placeholder="Sistem Academic" />
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.select name="smtp_encryption" label="Enkripsi" icon="security" :options="['tls' => 'TLS', 'ssl' => 'SSL', 'none' => 'None']" />
                            <x-input.input name="smtp_timeout" label="Timeout (detik)" icon="hourglass_empty" value="30" />
                        </div>
                        <div class="pt-4 border-t border-card-border mt-6 flex justify-end gap-2">
                            <x-button.button variant="outline" icon="send" size="sm">Kirimi Test Email</x-button.button>
                            <x-button.button variant="success" icon="save" size="sm">Simpan SMTP</x-button.button>
                        </div>
                    </form>
                </div>

                {{-- BRANDING --}}
                <div x-show="tab==='branding'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Logo & Tampilan</h3>
                    <p class="text-xs text-muted mb-6">Kustomisasi visual aplikasi sesuai identitas dan standarisasi warna kampus.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="app_name" label="Nama Aplikasi (Tab Browser)" icon="title" value="Sistem Informasi Akademik" />
                            <x-input.input name="app_tagline" label="Slogan / Tagline Kampus" icon="short_text" value="Unggul, Berkarakter & Berteknologi" />
                        </div>
                        <div class="grid md:grid-cols-3 gap-5 p-4 bg-surface/30 border border-card-border rounded-xl">
                            <div class="space-y-1.5">
                                <label class="block text-xs font-semibold text-foreground">Warna Tema Utama (Brand HEX)</label>
                                <div class="flex items-center gap-2">
                                    <input type="color" name="brand_color" value="#059669" class="w-10 h-9 p-0.5 border border-card-border rounded-lg cursor-pointer bg-card shadow-xs">
                                    <input type="text" value="#059669" class="flex-1 text-xs font-mono py-1.5 px-3 bg-card border border-card-border rounded-lg text-foreground focus:ring-1 focus:ring-brand-500 outline-hidden" placeholder="#059669">
                                </div>
                            </div>
                            <x-input.select name="default_theme" label="Mode Tampilan Default" icon="dark_mode" :options="[
                                'system' => 'Mengikuti Sistem (Auto)',
                                'light' => 'Mode Terang (Light)',
                                'dark' => 'Mode Gelap (Dark)'
                            ]" />
                            <x-input.input name="copyright_text" label="Teks Hak Cipta (Footer)" icon="copyright" value="© 2026 STIT Tunas Bangsa" />
                        </div>
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.image-upload name="logo" label="Logo Utama" icon="image" accept="image/*" />
                            <x-input.image-upload name="logo_small" label="Favicon" icon="web_asset" accept="image/png,image/x-icon" />
                        </div>
                        <x-input.image-upload name="login_bg" label="Background Halaman Login" icon="wallpaper" accept="image/*" />
                        <div class="pt-4 border-t border-card-border mt-6 flex justify-end">
                            <x-button.button type="submit" variant="success" icon="save" size="sm">Terapkan Desain</x-button.button>
                        </div>
                    </form>
                </div>

                {{-- PERIODE --}}
                <div x-show="tab==='periode'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Tahun Akademik & Periode</h3>
                    <p class="text-xs text-muted mb-6">Tentukan semester aktif dan batas waktu transaksi akademik mahasiswa.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.select name="periode_aktif" label="Semester Aktif Utama" icon="calendar_today" :options="[
                                '20252' => '2025/2026 Genap',
                                '20251' => '2025/2026 Ganjil',
                                '20261' => '2026/2027 Ganjil'
                            ]" />
                            <x-input.select name="status_sistem" label="Status Akses Mahasiswa" icon="toggle_on" :options="[
                                'krs' => 'Masa Pengisian KRS',
                                'perkuliahan' => 'Masa Perkuliahan & UTS',
                                'khs' => 'Masa Input Nilai & KHS',
                                'tenang' => 'Minggu Tenang / Non-aktif'
                            ]" />
                        </div>
                        <div class="p-4 bg-surface/30 border border-card-border rounded-xl">
                            <h4 class="text-xs font-bold text-muted uppercase tracking-wider mb-3">Locking System (Batas Waktu)</h4>
                            <div class="grid md:grid-cols-2 gap-4">
                                <x-input.input type="date" name="batas_krs" label="Batas Akhir Pengisian KRS" icon="event_busy" />
                                <x-input.input type="date" name="batas_nilai" label="Batas Akhir Dosen Input Nilai" icon="event_busy" />
                            </div>
                        </div>
                        <div class="pt-4 border-t border-card-border mt-6 flex justify-end">
                            <x-button.button type="submit" variant="success" icon="save" size="sm">Aktifkan Periode</x-button.button>
                        </div>
                    </form>
                </div>

                {{-- FEEDER --}}
                <div x-show="tab==='feeder'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Integrasi Neo Feeder</h3>
                    <p class="text-xs text-muted mb-6">Hubungkan sistem dengan PDDikti untuk sinkronisasi data.</p>

                    <form class="space-y-5">
                        <x-input.input name="feeder_url" label="URL API Feeder" icon="link" placeholder="https://pddikti..." />
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.select name="feeder_env" label="Environment" :options="['prod' => 'Produksi', 'dev' => 'Development/Sandbox']" />
                            <x-input.input name="feeder_username" label="Username Feeder" icon="person" />
                        </div>
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input type="password" name="feeder_password" label="Password Feeder" icon="lock" />
                            <x-input.input name="feeder_act" label="Aktor Login" icon="how_to_reg" placeholder="mahasiswa, pt" />
                        </div>
                        <div class="pt-4 border-t border-card-border mt-6 flex justify-end gap-2">
                            <x-button.button variant="outline" icon="sync" size="sm">Cek Koneksi</x-button.button>
                            <x-button.button variant="success" icon="save" size="sm">Simpan Konfigurasi</x-button.button>
                        </div>
                    </form>
                </div>

                {{-- WA --}}
                <div x-show="tab==='wa'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">WhatsApp Gateway</h3>
                    <p class="text-xs text-muted mb-6">Konfigurasi server WhatsApp untuk notifikasi broadcast.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="wa_url" label="Server URL" icon="hub" placeholder="https://wa.yourdomain.com" />
                            <x-input.input name="wa_token" label="API Token" icon="key" type="password" />
                        </div>
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.phone name="wa_admin" label="Nomor Admin Sender" icon="call" placeholder="0812..." />
                            <x-input.textarea name="wa_template_welcome" label="Template Pesan Welcome" icon="message" placeholder="Halo {nama}..." rows="3" />
                        </div>
                        <div class="pt-4 border-t border-card-border mt-6 flex justify-end">
                            <x-button.button variant="success" icon="save" size="sm">Simpan Pengaturan</x-button.button>
                        </div>
                    </form>
                </div>

                {{-- BACKUP --}}
                <div x-show="tab==='backup'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Backup Maintenance</h3>
                    <p class="text-xs text-muted mb-6">Pengaturan otomatisasi backup database.</p>

                    <div class="bg-card border border-card-border p-4 rounded-xl mb-6 flex items-center justify-between shadow-xs">
                        <div>
                            <h5 class="font-bold text-sm text-foreground mb-0.5">Backup Terakhir</h5>
                            <p class="text-xs text-muted">05 Mei 2026, 12:00 WIB</p>
                        </div>
                        <span class="px-2.5 py-0.5 bg-emerald-50 dark:bg-emerald-950/50 text-emerald-700 dark:text-emerald-400 text-xs font-semibold rounded-md border border-emerald-100 dark:border-emerald-900/30">Sukses</span>
                    </div>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.select name="backup_driver" label="Locations" icon="storage" :options="['local' => 'Local Server', 's3' => 'Amazon S3', 'gdrive' => 'Google Drive']" />
                            <x-input.select name="backup_schedule" label="Schedule" icon="schedule" :options="['daily' => 'Harian', 'weekly' => 'Mingguan', 'monthly' => 'Bulanan']" />
                        </div>
                        <div class="grid md:grid-cols-2 gap-5">
                            <x-input.input name="backup_path" label="Path Folder" icon="folder" placeholder="/storage/backups" />
                            <x-input.input name="backup_retention" label="Retensi (Jumlah File)" icon="delete_sweep" type="number" value="5" />
                        </div>
                        <div class="pt-4 border-t border-card-border mt-6 flex justify-start">
                            <x-button.button variant="brand" icon="download" size="sm">Backup Sekarang</x-button.button>
                        </div>
                    </form>
                </div>

                {{-- API --}}
                <div x-show="tab==='api'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Pengaturan API Eksternal</h3>
                    <p class="text-xs text-muted mb-6">Manajemen akses untuk integrasi pihak ketiga.</p>

                    <form class="space-y-5">
                        <div class="grid md:grid-cols-2 gap-5">
                            <div class="md:col-span-2">
                                <x-input.input name="api_key" label="API Key" icon="vpn_key" readonly value="sk-live-1234567890abcdef" class="bg-surface/50 font-mono text-sm">
                                    <button type="button" class="text-brand-600 dark:text-brand-400 hover:underline font-medium text-xs ml-2">Regenerate</button>
                                </x-input.input>
                            </div>
                            <x-input.input name="api_secret" type="password" label="API Secret" icon="lock" />
                            <x-input.input name="api_rate_limit" label="Rate Limit (Req/Menit)" icon="speed" value="60" />
                        </div>
                        <x-input.textarea name="api_whitelist" label="IP Whitelist" icon="security" placeholder="192.168.1.1, 127.0.0.1" rows="3" />
                        <div class="pt-4 border-t border-card-border mt-6 flex justify-end">
                            <x-button.button variant="success" icon="save" size="sm">Simpan Konfigurasi API</x-button.button>
                        </div>
                    </form>
                </div>

                {{-- GRADING --}}
                <div x-show="tab==='grading'"
                    x-data="{
                        openModal: false,
                        openDeleteModal: false,
                        selectedSkala: ''
                    }"
                    x-cloak
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                >
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                        <div>
                            <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Skala Nilai & Standar Kelulusan</h3>
                            <p class="text-xs text-muted">Atur regulasi konversi nilai akhir mahasiswa untuk kalkulasi Transkrip Nilai otomatis.</p>
                        </div>

                        <x-button.button @click="openModal = true" variant="outline" icon="add" size="sm">
                            Tambah Skala
                        </x-button.button>
                    </div>

                    <div class="overflow-x-auto w-full bg-card border border-card-border rounded-xl shadow-xs">
                        <x-table.table class="min-w-full text-left">
                            <thead>
                                <tr class="bg-surface/30 border-b border-card-border">
                                    <x-table.th class="py-3.5 px-4 font-semibold text-xs tracking-wider text-muted uppercase w-28">Nilai Huruf</x-table.th>
                                    <x-table.th class="py-3.5 px-4 font-semibold text-xs tracking-wider text-muted uppercase w-28">Bobot Nilai</x-table.th>
                                    <x-table.th class="py-3.5 px-4 font-semibold text-xs tracking-wider text-muted uppercase text-center w-36">Rentang Minimum</x-table.th>
                                    <x-table.th class="py-3.5 px-4 font-semibold text-xs tracking-wider text-muted uppercase text-center w-36">Rentang Maksimum</x-table.th>
                                    <x-table.th class="py-3.5 px-4 font-semibold text-xs tracking-wider text-muted uppercase text-center w-32">Status Kelulusan</x-table.th>
                                    <x-table.th class="py-3.5 px-4 w-12"></x-table.th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-card-border bg-transparent">
                                {{-- Baris Nilai A --}}
                                <x-table.tr class="hover:bg-surface/20 transition-colors">
                                    <x-table.td class="py-2.5 px-4 font-bold text-sm text-foreground">A</x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-sm font-medium text-muted">4.00</x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <x-input.input name="min_a" type="number" step="0.01" value="85.00" class="w-24 mx-auto py-0 text-center" />
                                    </x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <x-input.input name="max_a" type="number" step="0.01" value="100.00" class="w-24 mx-auto py-0 text-center" />
                                    </x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <span class="px-2.5 py-0.5 bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-400 text-xs font-semibold rounded-md border border-emerald-100/30">Lulus</span>
                                    </x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <button type="button" @click="selectedSkala = 'A'; openDeleteModal = true" class="material-icons-outlined text-sm text-muted hover:text-red-600 transition-colors cursor-pointer">delete</button>
                                    </x-table.td>
                                </x-table.tr>

                                {{-- Baris Nilai B --}}
                                <x-table.tr class="hover:bg-surface/20 transition-colors">
                                    <x-table.td class="py-2.5 px-4 font-bold text-sm text-foreground">B</x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-sm font-medium text-muted">3.00</x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <x-input.input name="min_b" type="number" step="0.01" value="70.00" class="w-24 mx-auto py-0 text-center" />
                                    </x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <x-input.input name="max_b" type="number" step="0.01" value="84.99" class="w-24 mx-auto py-0 text-center" />
                                    </x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <span class="px-2.5 py-0.5 bg-emerald-50 dark:bg-emerald-950/40 text-emerald-700 dark:text-emerald-400 text-xs font-semibold rounded-md border border-emerald-100/30">Lulus</span>
                                    </x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <button type="button" @click="selectedSkala = 'B'; openDeleteModal = true" class="material-icons-outlined text-sm text-muted hover:text-red-600 transition-colors cursor-pointer">delete</button>
                                    </x-table.td>
                                </x-table.tr>

                                {{-- Baris Nilai E --}}
                                <x-table.tr class="hover:bg-surface/20 transition-colors">
                                    <x-table.td class="py-2.5 px-4 font-bold text-sm text-foreground">E</x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-sm font-medium text-muted">0.00</x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <x-input.input name="min_e" type="number" step="0.01" value="0.00" class="w-24 mx-auto py-0 text-center" />
                                    </x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <x-input.input name="max_e" type="number" step="0.01" value="44.99" class="w-24 mx-auto py-0 text-center" />
                                    </x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <span class="px-2.5 py-0.5 bg-red-50 dark:bg-red-950/40 text-red-700 dark:text-red-400 text-xs font-semibold rounded-md border border-red-100/30">Tidak Lulus</span>
                                    </x-table.td>
                                    <x-table.td class="py-2.5 px-4 text-center">
                                        <button type="button" @click="selectedSkala = 'E'; openDeleteModal = true" class="material-icons-outlined text-sm text-muted hover:text-red-600 transition-colors cursor-pointer">delete</button>
                                    </x-table.td>
                                </x-table.tr>
                            </tbody>
                        </x-table.table>
                    </div>

                    <div class="mt-4 flex justify-end">
                        <x-button.button type="submit" variant="success" icon="save" size="sm">
                            Simpan Skala Nilai
                        </x-button.button>
                    </div>

                    {{-- MODAL TAMBAH DATA --}}
                    <div
                        x-show="openModal"
                        class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                        <div class="fixed inset-0 bg-gray-900/40 dark:bg-black/60 backdrop-blur-xs" @click="openModal = false"></div>

                        <div
                            class="relative w-full max-w-md bg-card border border-card-border rounded-xl shadow-xl overflow-hidden transform transition-all"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                        >
                            <div class="p-5 border-b border-card-border flex items-center justify-between">
                                <h4 class="text-md font-bold text-foreground tracking-tight flex items-center gap-2">
                                    <span class="material-icons-outlined text-brand-600">add_box</span>
                                    Tambah Skala Nilai Baru
                                </h4>
                                <button @click="openModal = false" class="text-muted hover:text-foreground transition-colors cursor-pointer">
                                    <span class="material-icons-outlined text-lg">close</span>
                                </button>
                            </div>

                            <form class="p-5 space-y-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <x-input.input name="modal_nilai_huruf" label="Nilai Huruf" placeholder="Contoh: A-" required />
                                    <x-input.input name="modal_bobot_nilai" type="number" step="0.01" label="Bobot Nilai" placeholder="4.00" required />
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <x-input.input name="modal_min" type="number" step="0.01" label="Nilai Minimum" placeholder="0.00" required />
                                    <x-input.input name="modal_max" type="number" step="0.01" label="Nilai Maksimum" placeholder="100.00" required />
                                </div>
                                <x-input.select name="modal_status" label="Status Kelulusan" :options="['1' => 'Lulus', '0' => 'Tidak Lulus']" />

                                <div class="pt-4 border-t border-card-border flex justify-end gap-2">
                                    <x-button.button type="button" @click="openModal = false" variant="outline" size="sm">
                                        Batal
                                    </x-button.button>
                                    <x-button.button type="submit" variant="success" icon="check" size="sm">
                                        Simpan Data
                                    </x-button.button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div
                        x-show="openDeleteModal"
                        class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                        {{-- Backdrop --}}
                        <div class="fixed inset-0 bg-gray-900/40 dark:bg-black/60 backdrop-blur-xs" @click="openDeleteModal = false"></div>

                        {{-- Modal Content --}}
                        <div
                            class="relative w-full max-w-sm bg-card border border-card-border rounded-xl shadow-xl overflow-hidden transform transition-all"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                        >
                            <div class="p-6 text-center">
                                {{-- Warning Icon --}}
                                <div class="w-12 h-12 rounded-full bg-red-50 dark:bg-red-950/50 flex items-center justify-center mx-auto mb-4 border border-red-100 dark:border-red-900/30">
                                    <span class="material-icons-outlined text-red-600 dark:text-red-400 text-2xl">gavel</span>
                                </div>

                                <h4 class="text-md font-bold text-foreground tracking-tight mb-1">Hapus Skala Nilai?</h4>
                                <p class="text-xs text-muted leading-relaxed px-2">
                                    Apakah Anda yakin ingin menghapus skala nilai huruf <span class="font-bold text-foreground" x-text="selectedSkala"></span>? Tindakan ini tidak dapat dibatalkan dan memengaruhi kalkulasi KHS.
                                </p>
                            </div>

                            <div class="p-4 bg-surface/30 border-t border-card-border flex justify-end gap-2">
                                <x-button.button type="button" @click="openDeleteModal = false" variant="outline" size="sm">
                                    Batal
                                </x-button.button>
                                <form action="#" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <x-button.button type="submit" variant="danger" icon="delete" size="sm">
                                        Ya, Hapus
                                    </x-button.button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- MODAL OPEN COMPONENT --}}
                    <div
                        x-show="openModal"
                        class="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                        {{-- Backdrop --}}
                        <div class="fixed inset-0 bg-gray-900/40 dark:bg-black/60 backdrop-blur-xs" @click="openModal = false"></div>

                        {{-- Modal Content --}}
                        <div
                            class="relative w-full max-w-md bg-card border border-card-border rounded-xl shadow-xl overflow-hidden transform transition-all"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                        >
                            <div class="p-5 border-b border-card-border flex items-center justify-between">
                                <h4 class="text-md font-bold text-foreground tracking-tight flex items-center gap-2">
                                    <span class="material-icons-outlined text-brand-600">add_box</span>
                                    Tambah Skala Nilai Baru
                                </h4>
                                <button @click="openModal = false" class="text-muted hover:text-foreground transition-colors cursor-pointer">
                                    <span class="material-icons-outlined text-lg">close</span>
                                </button>
                            </div>

                            <form class="p-5 space-y-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <x-input.input name="modal_nilai_huruf" label="Nilai Huruf" placeholder="Contoh: A-" required />
                                    <x-input.input name="modal_bobot_nilai" type="number" step="0.01" label="Bobot Nilai" placeholder="4.00" required />
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <x-input.input name="modal_min" type="number" step="0.01" label="Nilai Minimum" placeholder="0.00" required />
                                    <x-input.input name="modal_max" type="number" step="0.01" label="Nilai Maksimum" placeholder="100.00" required />
                                </div>

                                <x-input.select name="modal_status" label="Status Kelulusan" :options="['1' => 'Lulus', '0' => 'Tidak Lulus']" />

                                <div class="pt-4 border-t border-card-border flex justify-end gap-2">
                                    <x-button.button type="button" @click="openModal = false" variant="outline" size="sm">
                                        Batal
                                    </x-button.button>
                                    <x-button.button type="submit" variant="success" icon="check" size="sm">
                                        Simpan Data
                                    </x-button.button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- SESSIONS --}}
                <div x-show="tab==='sessions'" x-cloak x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0">
                    <h3 class="text-lg font-bold text-foreground mb-0.5 tracking-tight">Sesi Perangkat Aktif</h3>
                    <p class="text-xs text-muted mb-6">Daftar perangkat yang baru saja mengakses akun super administrator Anda.</p>

                    <div class="space-y-3">
                        <div class="p-4 bg-card border border-card-border rounded-xl flex items-center justify-between shadow-xs">
                            <div class="flex items-center gap-3">
                                <span class="material-icons-outlined text-2xl text-brand-600">desktop_windows</span>
                                <div>
                                    <div class="text-sm font-semibold text-foreground">Chrome Browser - Windows 11</div>
                                    <div class="text-xs text-muted">IP Address: 182.1.23.104 • <span class="text-brand-600 font-medium">Perangkat Ini</span></div>
                                </div>
                            </div>
                            <span class="text-[11px] font-semibold text-brand-700 bg-brand-50 dark:bg-brand-950/50 px-2 py-0.5 rounded-md">Aktif</span>
                        </div>
                        <div class="p-4 bg-card border border-card-border rounded-xl flex items-center justify-between shadow-xs opacity-75">
                            <div class="flex items-center gap-3">
                                <span class="material-icons-outlined text-2xl text-muted">phone_android</span>
                                <div>
                                    <div class="text-sm font-semibold text-foreground">Safari - iPhone 15 Pro</div>
                                    <div class="text-xs text-muted">IP Address: 36.85.12.9 • Terakhir diakses 2 jam yang lalu</div>
                                </div>
                            </div>
                            <button type="button" class="text-xs text-red-600 hover:underline font-medium">Putuskan Sesi</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
