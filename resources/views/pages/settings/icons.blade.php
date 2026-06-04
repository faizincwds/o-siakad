@extends('layouts.app')

@section('title', 'Daftar Komponen SIAKAD')

@section('content')
<div
    x-data="{
        role: 'administrator',
        openModal: false,
        deleteModal: false,
        logoutModal: false,
        syncModal: false,
        backupModal: false,
        detailMahasiswa: false,
        tambahMahasiswaDrawer: false
    }"
    class="p-6 space-y-8 text-foreground"
>

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-card-border pb-5">
        <div>
            {{-- H1: Dioptimasikan untuk Judul Utama Halaman --}}
            <h1 class="text-xl font-bold tracking-tight md:text-2xl">Demo Komponen SIAKAD</h1>
            <p class="text-muted text-xs md:text-sm mt-1">Referensi standar penggunaan seluruh komponen antarmuka, widget, dan tata letak sistem.</p>
        </div>
        <x-ui.breadcrumb :items="['Dashboard', 'Pengaturan', 'Ikonic']" class="text-xs" />
    </div>

    {{-- KARTU RINGKASAN DASHBOARD --}}
    <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs">
        {{-- H2: Dioptimasikan untuk Judul Section Utama --}}
        <h2 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
            <x-ui.icon name="chart" size="sm" />
            Metrik & Ringkasan Data
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="rounded-xl border border-card-border p-4 bg-surface/10 hover:bg-surface/30 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 rounded-lg bg-brand-500/10 text-brand-600 dark:text-brand-400 shrink-0">
                        <x-ui.icon name="student" size="md" />
                    </div>
                    <div class="min-w-0">
                        <p class="text-muted text-[11px] font-semibold uppercase tracking-wider truncate">Total Mahasiswa</p>
                        {{-- H3: Dioptimasikan untuk Angka Stat / Nilai Besar --}}
                        <h3 class="text-lg font-bold tracking-tight mt-0.5 md:text-xl">1.250</h3>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-card-border p-4 bg-surface/10 hover:bg-surface/30 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 shrink-0">
                        <x-ui.icon name="lecturer" size="md" />
                    </div>
                    <div class="min-w-0">
                        <p class="text-muted text-[11px] font-semibold uppercase tracking-wider truncate">Dosen Aktif</p>
                        <h3 class="text-lg font-bold tracking-tight mt-0.5 md:text-xl">95</h3>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-card-border p-4 bg-surface/10 hover:bg-surface/30 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 rounded-lg bg-blue-500/10 text-blue-600 dark:text-blue-400 shrink-0">
                        <x-ui.icon name="course" size="md" />
                    </div>
                    <div class="min-w-0">
                        <p class="text-muted text-[11px] font-semibold uppercase tracking-wider truncate">Mata Kuliah</p>
                        <h3 class="text-lg font-bold tracking-tight mt-0.5 md:text-xl">182</h3>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-card-border p-4 bg-surface/10 hover:bg-surface/30 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="p-2.5 rounded-lg bg-amber-500/10 text-amber-600 dark:text-amber-400 shrink-0">
                        <x-ui.icon name="finance" size="md" />
                    </div>
                    <div class="min-w-0">
                        <p class="text-muted text-[11px] font-semibold uppercase tracking-wider truncate">Total Pembayaran</p>
                        <h3 class="text-lg font-bold tracking-tight mt-0.5 md:text-xl">Rp 120 Jt</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- INFORMASI KAMPUS & MAPS --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-card border border-card-border rounded-xl p-5 flex flex-col justify-between shadow-xs lg:col-span-1">
            <div>
                <h2 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
                    <x-ui.icon name="home" size="sm" />
                    Informasi Kampus
                </h2>
                <div class="space-y-3.5 border-t border-card-border/60 pt-3">
                    <div>
                        <span class="text-muted block text-[11px] uppercase tracking-wider mb-0.5">Nama Institusi</span>
                        {{-- H4: Dioptimasikan untuk Judul Informasi di dalam Sub-Card --}}
                        <h4 class="text-sm font-semibold">STIT Tunas Bangsa Banjarnegara</h4>
                    </div>
                    <div>
                        <span class="text-muted block text-[11px] uppercase tracking-wider mb-0.5">Alamat Utama</span>
                        <p class="text-sm">Jl. Raya Banjarnegara No.10, Jawa Tengah</p>
                    </div>
                    <div>
                        <span class="text-muted block text-[11px] uppercase tracking-wider mb-0.5">Kontak Telepon</span>
                        <p class="text-sm">0286-xxxxxx</p>
                    </div>
                </div>
            </div>

            <div class="pt-4 mt-4 border-t border-card-border/60">
                <x-button.google-maps-link query="STIT Tunas Bangsa Banjarnegara" variant="success" icon="map" class="w-full justify-center text-xs">
                    Navigasi ke Kampus
                </x-button.google-maps-link>
            </div>
        </div>

        <div class="lg:col-span-2 overflow-hidden rounded-xl border border-card-border shadow-xs">
            <x-widget.google-maps title="Sematkan Peta Lokasi" query="STIT Tunas Bangsa Banjarnegara" />
        </div>
    </div>

    {{-- GRAFIK / CHART --}}
    <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs">
        <h2 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
            <x-ui.icon name="analytics" size="sm" />
            Visualisasi Grafik & Statistik
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <x-chart.line title="Grafik Mahasiswa Baru" :categories="['2021','2022','2023','2024','2025']" :series="[['name' => 'Mahasiswa', 'data' => [120, 150, 180, 210, 250]]]" />
            <x-chart.bar title="Mahasiswa per Fakultas" :categories="['FT', 'FEB', 'FKIP', 'FAI']" :series="[['name' => 'Jumlah', 'data' => [250, 180, 150, 120]]]" />
            <x-chart.pie title="Status Mahasiswa" :labels="['Aktif', 'Cuti', 'Lulus']" :series="[850, 50, 200]" />
            <x-chart.donut title="Pembayaran UKT" :labels="['Lunas', 'Belum Lunas']" :series="[780, 120]" />
        </div>
    </div>

    {{-- WIDGET SISTEM --}}
    <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs">
        <h2 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
            <x-ui.icon name="monitoring" size="sm" />
            Integrasi & Widget Pemantau
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <x-widget.feeder-status />
            <x-widget.system-health />
            <x-widget.calendar />
            <x-widget.quick-menu />
        </div>
        <div class="mt-5">
            <x-widget.activity />
        </div>
    </div>

    {{-- STATISTIK & TABEL DATA --}}
    <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs">
        <h2 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
            <x-ui.icon name="database" size="sm" />
            Manajemen Struktur Data Tabel
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-5">
            <x-stats.stat-card title="Mahasiswa Aktif" value="2,543">
                <x-slot:icon><x-stats.stat-icon icon="groups" /></x-slot:icon>
            </x-stats.stat-card>
            <x-stats.stat-card title="Dosen" value="132">
                <x-slot:icon><x-stats.stat-icon icon="school" /></x-slot:icon>
            </x-stats.stat-card>
            <x-stats.stat-card title="Program Studi" value="14">
                <x-slot:icon><x-stats.stat-icon icon="apartment" /></x-slot:icon>
            </x-stats.stat-card>
            <x-stats.stat-card title="Alumni" value="8,721">
                <x-slot:icon><x-stats.stat-icon icon="workspace_premium" /></x-slot:icon>
            </x-stats.stat-card>
        </div>

        <x-table.table>
            <x-table.toolbar>
                <h3 class="text-xs font-bold md:text-sm">Data Mahasiswa</h3>
                <div class="flex items-center gap-2">
                    <x-table.import-button />
                    <x-table.export-button />
                    <x-button.button icon="add" size="sm" class="text-xs" @click="openModal = true">Tambah</x-button.button>
                </div>
            </x-table.toolbar>

            <thead>
                <tr class="border-b border-card-border">
                    <x-table.th class="text-xs font-bold uppercase tracking-wider text-muted">NIM</x-table.th>
                    <x-table.th class="text-xs font-bold uppercase tracking-wider text-muted">Nama</x-table.th>
                    <x-table.th class="text-xs font-bold uppercase tracking-wider text-muted">Program Studi</x-table.th>
                    <x-table.th class="text-right text-xs font-bold uppercase tracking-wider text-muted">Aksi</x-table.th>
                </tr>
            </thead>
            <tbody class="divide-y divide-card-border/40 text-xs md:text-sm">
                <tr class="hover:bg-surface/20 transition-colors">
                    <x-table.td class="font-semibold">23010001</x-table.td>
                    <x-table.td>Ahmad Fauzi</x-table.td>
                    <x-table.td>Informatika</x-table.td>
                    <x-table.td class="text-right">
                        <div class="flex items-center justify-end gap-1.5">
                            <x-button.icon-button icon="visibility" @click="detailMahasiswa = true" />
                            <x-button.icon-button icon="edit" variant="warning" @click="openModal = true" />
                            <x-button.icon-button icon="delete" variant="danger" @click="deleteModal = true" />
                        </div>
                    </x-table.td>
                </tr>
            </tbody>
        </x-table.table>
    </div>

    {{-- KONTROL MODAL, DIALOG KONFIRMASI & PANEL DRAWER --}}
    <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs">
        <h2 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
            <x-ui.icon name="settings" size="sm" />
            Interaksi Dialog, Trigger Modal & Panel Samping
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Form Triggers --}}
            <div class="p-4 border border-card-border rounded-xl bg-surface/10 space-y-3">
                {{-- H5: Dioptimasikan untuk Sub-label Kontrol / Petunjuk Kecil --}}
                <h5 class="text-[11px] font-bold text-muted uppercase tracking-wider block">Form Input Modal</h5>
                <x-button.button icon="add" size="sm" class="w-full justify-center text-xs" @click="openModal = true">
                    Buka Modal Input Data
                </x-button.button>
            </div>

            {{-- Confirmation Triggers --}}
            <div class="p-4 border border-card-border rounded-xl bg-surface/10 space-y-3">
                <h5 class="text-[11px] font-bold text-muted uppercase tracking-wider block">Dialog Konfirmasi</h5>
                <div class="grid grid-cols-2 gap-2">
                    <x-button.button variant="danger" icon="delete" size="sm" class="justify-center text-xs" @click="deleteModal = true">Hapus</x-button.button>
                    <x-button.button variant="warning" icon="logout" size="sm" class="justify-center text-xs" @click="logoutModal = true">Keluar</x-button.button>
                    <x-button.button variant="info" icon="sync" size="sm" class="justify-center text-xs" @click="syncModal = true">Sync</x-button.button>
                    <x-button.button variant="success" icon="backup" size="sm" class="justify-center text-xs" @click="backupModal = true">Backup</x-button.button>
                </div>
            </div>

            {{-- Drawer Triggers --}}
            <div class="p-4 border border-card-border rounded-xl bg-surface/10 space-y-3">
                <h5 class="text-[11px] font-bold text-muted uppercase tracking-wider block">Panel Samping (Drawer)</h5>
                <div class="flex flex-col gap-2">
                    <x-button.button icon="visibility" variant="outline" size="sm" class="w-full justify-center text-xs" @click="detailMahasiswa = true">
                        Lihat Detail Samping
                    </x-button.button>
                    <x-button.button icon="add" variant="secondary" size="sm" class="w-full justify-center text-xs" @click="tambahMahasiswaDrawer = true">
                        Tambah via Drawer
                    </x-button.button>
                </div>
            </div>
        </div>

        {{-- COMPONENT INJECTIONS --}}
        <x-modal.modal x-show="openModal" @close.window="openModal = false">
            <x-slot:title><h3 class="text-sm font-bold">Tambah Mahasiswa Baru</h3></x-slot:title>
            <div class="space-y-4 py-2 text-xs md:text-sm">
                <x-input.input label="Nomor Induk Mahasiswa (NIM)" name="nim" placeholder="Contoh: 23010001" icon="badge" />
                <x-input.input label="Nama Lengkap" name="nama" placeholder="Masukkan nama sesuai ijazah" icon="person" />
                <x-input.select label="Program Studi Terdaftar" name="prodi" icon="apartment" :options="['TI' => 'Teknik Informatika', 'SI' => 'Sistem Informasi']" />
            </div>
            <x-slot:footer>
                <div class="flex justify-end gap-2.5 w-full">
                    <x-button.button variant="ghost" size="sm" class="text-xs" @click="openModal = false">Batal</x-button.button>
                    <x-button.button icon="save" variant="primary" size="sm" class="text-xs">Simpan Data</x-button.button>
                </div>
            </x-slot:footer>
        </x-modal.modal>

        <x-modal.confirm show="deleteModal" title="Hapus Data Mahasiswa" message="Apakah Anda yakin? Data yang dihapus bersifat permanen." confirmText="Ya, Hapus" variant="danger" @confirm="deleteModal = false;" @close="deleteModal = false" />
        <x-modal.confirm show="logoutModal" title="Keluar dari Sistem" message="Sesi aktif Anda akan dihentikan." confirmText="Keluar" variant="warning" @confirm="logoutModal = false" @close="logoutModal = false" />
        <x-modal.confirm show="syncModal" title="Sinkronisasi PDDikti" message="Menyinkronkan data lokal ke cloud server Feeder Dikti." confirmText="Mulai Sinkronisasi" variant="info" @confirm="syncModal = false" @close="syncModal = false" />
        <x-modal.confirm show="backupModal" title="Cadangkan Database" message="Membuat snapshot berkas SQL terbaru ke storage utama." confirmText="Proses Cadangan" variant="success" @confirm="backupModal = false" @close="backupModal = false" />

        <x-modal.drawer show="detailMahasiswa" title="Detail Riwayat Mahasiswa" size="lg" @close="detailMahasiswa = false">
            <div class="space-y-4 p-1 text-xs">
                <div class="p-3 bg-surface/40 border border-card-border rounded-xl">
                    {{-- H6: Dioptimasikan untuk Label Terkecil di Dalam Detail Box --}}
                    <h6 class="text-[11px] text-muted font-bold uppercase tracking-wider">Nomor Induk Mahasiswa (NIM)</h6>
                    <div class="font-semibold text-sm mt-0.5">23010001</div>
                </div>
                <div class="p-3 bg-surface/40 border border-card-border rounded-xl">
                    <h6 class="text-[11px] text-muted font-bold uppercase tracking-wider">Nama Lengkap Sesuai KTP</h6>
                    <div class="font-semibold text-sm mt-0.5">Ahmad Fauzi</div>
                </div>
            </div>
        </x-modal.drawer>

        <x-modal.drawer show="tambahMahasiswaDrawer" title="Pendaftaran Mahasiswa Cepat" size="xl" @close="tambahMahasiswaDrawer = false">
            <div class="space-y-4 p-1 text-xs md:text-sm">
                <x-input.input label="NIM" name="nim" icon="badge" />
                <x-input.input label="Nama Lengkap" name="nama" icon="person" />
                <x-input.input label="Alamat Email Institusi" name="email" icon="mail" type="email" />
            </div>
            <x-slot:footer>
                <div class="flex justify-end gap-2.5 w-full">
                    <x-button.button variant="ghost" size="sm" class="text-xs" @click="tambahMahasiswaDrawer = false">Batal</x-button.button>
                    <x-button.button variant="success" icon="save" size="sm" class="text-xs">Simpan Pendaftaran</x-button.button>
                </div>
            </x-slot:footer>
        </x-modal.drawer>
    </div>

    {{-- HAK AKSES & PERIZINAN --}}
    <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs">
        <h2 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
            <x-ui.icon name="security" size="sm" />
            Konfigurasi Hak Akses & Matriks Perizinan
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <div class="space-y-2.5">
                <x-permission.role-card name="Administrator" icon="admin_panel_settings" description="Akses penuh sistem" :active="true" />
                <x-permission.role-card name="Akademik" icon="school" description="Manajemen data akademik" />
                <x-permission.role-card name="Keuangan" icon="payments" description="Manajemen transaksi & UKT" />
                <x-permission.role-card name="Dosen" icon="person" description="Pengisian nilai & bimbingan" />
                <x-permission.role-card name="Mahasiswa" icon="groups" description="Akses KRS & KHS pribadi" />
            </div>

            <div class="lg:col-span-3 border border-card-border rounded-xl p-4 bg-surface/10 flex flex-col justify-between">
                <x-permission.permission-group title="Matriks Perizinan Global" icon="shield">
                    <x-permission.permission-matrix :modules="['Dashboard', 'Mahasiswa', 'Dosen', 'Program Studi', 'Mata Kuliah', 'KRS', 'KHS', 'Jadwal Kuliah', 'PMB', 'Keuangan', 'Neo Feeder', 'Pengguna', 'Pengaturan']" />
                </x-permission.permission-group>

                <div class="flex justify-end mt-4 border-t border-card-border/60 pt-3">
                    <x-button.button icon="save" variant="success" size="sm" class="text-xs">
                        Simpan Matriks Otorisasi
                    </x-button.button>
                </div>
            </div>
        </div>
    </div>

    {{-- KOMPONEN AKADEMIK --}}
    <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs">
        <h2 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
            <x-ui.icon name="transcript" size="sm" />
            Komponen Khusus Layanan Academic Card
        </h2>
        {{-- Diubah ke grid-cols-1 md:grid-cols-2 lg:grid-cols-3 agar proporsi card seimbang --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            <x-academic.krs-card semester="Genap 2025/2026" sks="24" status="Disetujui">
                <x-button.button size="sm" icon="visibility" class="mt-2 text-xs">Lihat Lembar KRS</x-button.button>
            </x-academic.krs-card>
            <x-academic.khs-card semester="Genap 2025/2026" ips="3.85" sks="24" />
            <x-academic.transcript-card ipk="3.79" sks_lulus="132" />
            <x-academic.schedule-card matkul="Pemrograman Web Lanjut" dosen="Ahmad Fauzi, M.Kom" hari="Senin" jam="08.00 - 10.30" ruang="Lab Komputer Utama" />
            <x-academic.attendance-card matkul="Perancangan Basis Data" hadir="12" izin="1" sakit="0" alpa="1" />
        </div>
    </div>

    {{-- LINIMASA AKTIVITAS --}}
    <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs">
        <h2 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
            <x-ui.icon name="announcement" size="sm" />
            Alur Linimasa Transaksi & Log Sistem
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs">
            <x-timeline.timeline title="Aktivitas Mahasiswa Terakhir" icon="history">
                <x-timeline.timeline-item title="Registrasi Akun" description="Mahasiswa berhasil melakukan verifikasi email." date="12 Juli 2026 08:15" icon="person_add" color="success" />
                <x-timeline.timeline-item title="Penyusunan KRS" description="Mengambil beban penuh beban 24 SKS." date="15 Juli 2026 09:00" icon="fact_check" color="primary" />
                <x-timeline.timeline-item title="Pembayaran UKT Bank" description="Host-to-host verifikasi otomatis berhasil." date="20 Juli 2026 14:35" icon="payments" color="success" />
                <x-timeline.timeline-item title="Sinkronisasi Sinkron" description="Berkas registrasi masuk antrean Neo Feeder." date="25 Juli 2026 22:10" icon="sync" color="info" />
                <x-timeline.timeline-item title="Berkas Unggahan Gagal" description="Ukuran berkas transkrip asal melebihi batas batas 2MB." date="26 Juli 2026 11:42" icon="error" color="danger" />
                <x-timeline.timeline-item title="Peninjauan Operator" description="Dokumen koreksi sedang ditinjau." date="27 Juli 2026 07:15" icon="hourglass_top" color="warning" />
            </x-timeline.timeline>

            <x-timeline.timeline title="Log Audit Keamanan" icon="shield">
                <x-timeline.timeline-item title="Autentikasi Berhasil" date="Hari ini, 08:00" icon="login" color="success" />
                <x-timeline.timeline-item title="Mutasi Rekord Mahasiswa" description="Modifikasi profil NIM 20240001" date="08:15" icon="edit" color="info" />
                <x-timeline.timeline-item title="Destruksi Jadwal Kuliah" description="Penghapusan slot ruang kelas Basis Data" date="09:30" icon="delete" color="danger" />
            </x-timeline.timeline>
        </div>
    </div>

    {{-- ELEMEN INTERAKTIF LAINNYA --}}
    <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs">
        <h2 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
            <x-ui.icon name="copy" size="sm" />
            Variasi Utilitas Input & Penanda Status
        </h2>

        <div class="space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-3 text-xs">
                <x-alert.success>Data tersimpan di server local.</x-alert.success>
                <x-alert.error>Koneksi database Feeder terputus.</x-alert.error>
                <x-alert.warning>Tinjau ulang SKS sebelum dikunci.</x-alert.warning>
                <x-alert.info>Tahun Ajaran aktif: 2025/2026 Genap.</x-alert.info>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 border-y border-card-border/60 py-5 text-xs">
                <div><x-input.otp name="kode_otp" label="Kredensial OTP Dua Faktor" /></div>
                <div><x-input.color name="warna" label="Skema Warna Dasbor" /></div>
                <div><x-input.editor name="konten" label="Editor Pengumuman HTML" /></div>
            </div>

            <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 bg-surface/20 p-4 rounded-xl border border-card-border">
                <div class="flex flex-wrap items-center gap-4 lg:gap-6">
                    <span class="text-[11px] font-bold text-muted uppercase tracking-wider">Indikator Status:</span>
                    <div class="flex items-center gap-4 text-xs font-medium">
                        <div class="flex items-center gap-1.5 text-green-600"><x-ui.icon name="security" size="sm" /> Operasional</div>
                        <div class="flex items-center gap-1.5 text-amber-500"><x-ui.icon name="notification" size="sm" /> Antrean</div>
                        <div class="flex items-center gap-1.5 text-red-600"><x-ui.icon name="delete" size="sm" /> Ditangguhkan</div>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <x-button.social-share url="https://siakad.kampus.ac.id" title="Portal SIAKAD Utama" />
                </div>
            </div>

            <div>
                <span class="text-[11px] font-bold text-muted uppercase tracking-wider block mb-3">Opsi Otentikasi Pihak Ketiga:</span>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-3 text-xs">
                    <x-button.social-login provider="google" href="/auth/google" />
                    <x-button.social-login provider="github" href="/auth/github" />
                    <x-button.social-login provider="facebook" href="/auth/facebook" />
                    <x-button.social-login provider="microsoft" href="/auth/microsoft" />
                </div>
            </div>
        </div>
    </div>

    {{-- GLOSARIUM IKON --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs lg:col-span-1">
            <h3 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
                <x-ui.icon name="filter" size="sm" />
                Skala Proporsi Ikon
            </h3>
            <div class="flex items-center justify-around bg-surface/20 border border-card-border rounded-xl p-4 h-32">
                <div class="text-center"><x-ui.icon name="dashboard" size="xs" /><p class="mt-2 text-[10px] text-muted">xs (14px)</p></div>
                <div class="text-center"><x-ui.icon name="dashboard" size="sm" /><p class="mt-2 text-[10px] text-muted">sm (18px)</p></div>
                <div class="text-center"><x-ui.icon name="dashboard" size="md" /><p class="mt-2 text-[10px] text-muted">md (22px)</p></div>
                <div class="text-center"><x-ui.icon name="dashboard" size="lg" /><p class="mt-2 text-[10px] text-muted">lg (26px)</p></div>
                <div class="text-center"><x-ui.icon name="dashboard" size="xl" /><p class="mt-2 text-[10px] text-muted">xl (30px)</p></div>
            </div>
        </div>

        <div class="rounded-xl border border-card-border bg-card p-5 shadow-xs lg:col-span-2">
            <h3 class="text-xs font-bold uppercase tracking-wider mb-4 flex items-center gap-2 text-muted">
                <x-ui.icon name="folder" size="sm" />
                Katalog Manifestasi Nama Ikon UI
            </h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2 max-h-32 overflow-y-auto border border-card-border/60 rounded-xl p-3 bg-surface/10">
                @foreach([
                    'dashboard', 'home', 'analytics', 'monitoring', 'student', 'students', 'graduate', 'alumni',
                    'lecturer', 'teacher', 'advisor', 'faculty', 'program-study', 'course', 'curriculum', 'classroom',
                    'schedule', 'calendar', 'attendance', 'grade', 'exam', 'transcript', 'krs', 'khs', 'thesis',
                    'graduation', 'finance', 'payment', 'invoice', 'wallet', 'scholarship', 'employee', 'staff',
                    'users', 'role', 'permission', 'document', 'folder', 'upload', 'download', 'print', 'report',
                    'chart', 'statistics', 'notification', 'announcement', 'mail', 'add', 'edit', 'save', 'delete',
                    'search', 'filter', 'refresh', 'copy', 'share', 'settings', 'security', 'backup', 'database',
                    'login', 'logout', 'password'
                ] as $icon)
                    <div class="flex items-center gap-2 p-1 hover:bg-surface/60 rounded-md transition-colors truncate">
                        <x-ui.icon name="{{ $icon }}" size="sm" class="text-muted shrink-0" />
                        <span class="text-foreground/80 font-mono text-[11px] truncate">{{ $icon }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
