@extends('layouts.auth')

@section('title', 'Daftar Komponen SIAKAD')

@section('content')
<div class="p-6 space-y-8">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-bold">Demo Komponen SIAKAD</h1>
        <p class="text-muted mt-2">Referensi penggunaan seluruh komponen dan ikon yang tersedia.</p>
    </div>

    {{-- GRAFIK / CHART --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Grafik & Statistik</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <x-chart.line
                title="Grafik Mahasiswa Baru"
                :categories="['2021','2022','2023','2024','2025']"
                :series="[
                    [
                        'name' => 'Mahasiswa',
                        'data' => [120, 150, 180, 210, 250]
                    ]
                ]"
            />

            <x-chart.bar
                title="Mahasiswa per Fakultas"
                :categories="['FT', 'FEB', 'FKIP', 'FAI']"
                :series="[
                    [
                        'name' => 'Jumlah',
                        'data' => [250, 180, 150, 120]
                    ]
                ]"
            />

            <x-chart.pie
                title="Status Mahasiswa"
                :labels="['Aktif', 'Cuti', 'Lulus']"
                :series="[850, 50, 200]"
            />

            <x-chart.donut
                title="Pembayaran UKT"
                :labels="['Lunas', 'Belum Lunas']"
                :series="[780, 120]"
            />
        </div>
    </div>

    {{-- WIDGET SISTEM --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Widget Sistem</h2>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">
            <x-widget.feeder-status />
            <x-widget.system-health />
            <x-widget.calendar />
            <x-widget.quick-menu />
        </div>
        <div class="mt-5">
            <x-widget.activity />
        </div>

        {{-- CONTOH MODAL & DRAWER --}}
        <div class="mt-6 space-y-4">
            <x-modal.modal
                name="tambahMahasiswa"
                title="Tambah Mahasiswa"
            >
                Form mahasiswa...
            </x-modal.modal>

            <x-modal.drawer
                name="detailMahasiswa"
                title="Detail Mahasiswa"
            >
                Data mahasiswa...
            </x-modal.drawer>
        </div>
    </div>

    {{-- HAK AKSES & PERIZINAN --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Hak Akses & Perizinan</h2>
        <div
            x-data="{ role: 'administrator' }"
            class="grid lg:grid-cols-4 gap-5"
        >
            {{-- DAFTAR PERAN --}}
            <div class="space-y-3">
                <x-permission.role-card
                    name="Administrator"
                    icon="admin_panel_settings"
                    description="Akses penuh sistem"
                    :active="true"
                />

                <x-permission.role-card
                    name="Akademik"
                    icon="school"
                    description="Manajemen akademik"
                />

                <x-permission.role-card
                    name="Keuangan"
                    icon="payments"
                    description="Manajemen pembayaran"
                />

                <x-permission.role-card
                    name="Dosen"
                    icon="person"
                />

                <x-permission.role-card
                    name="Mahasiswa"
                    icon="groups"
                />
            </div>

            {{-- MATRIKS PERIZINAN --}}
            <div class="lg:col-span-3">
                <x-permission.permission-group
                    title="Matriks Perizinan"
                    icon="shield"
                >
                    <x-permission.permission-matrix
                        :modules="[
                            'Dashboard', 'Mahasiswa', 'Dosen', 'Program Studi',
                            'Mata Kuliah', 'KRS', 'KHS', 'Jadwal Kuliah',
                            'PMB', 'Keuangan', 'Neo Feeder', 'Pengguna', 'Pengaturan'
                        ]"
                    />
                </x-permission.permission-group>

                <div class="flex justify-end mt-4">
                    <x-button.button
                        icon="save"
                        variant="success"
                    >
                        Simpan Perizinan
                    </x-button.button>
                </div>
            </div>
        </div>
    </div>

    {{-- KOMPONEN AKADEMIK --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Komponen Akademik</h2>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-5">
            <x-academic.krs-card
                semester="Genap 2025/2026"
                sks="24"
                status="Disetujui"
            >
                <x-button.button size="sm" icon="visibility">
                    Lihat KRS
                </x-button.button>
            </x-academic.krs-card>

            <x-academic.khs-card
                semester="Genap 2025/2026"
                ips="3.85"
                sks="24"
            />

            <x-academic.transcript-card
                ipk="3.79"
                sks_lulus="132"
            />

            <x-academic.schedule-card
                matkul="Pemrograman Web"
                dosen="Ahmad Fauzi, M.Kom"
                hari="Senin"
                jam="08.00 - 10.30"
                ruang="Lab Komputer 1"
            />

            <x-academic.attendance-card
                matkul="Basis Data"
                hadir="12"
                izin="1"
                sakit="0"
                alpa="1"
            />
        </div>
    </div>

    {{-- STATISTIK & TABEL --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Statistik & Tabel Data</h2>

        {{-- KARTU STATISTIK --}}
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5 mb-5">
            <x-stats.stat-card title="Mahasiswa Aktif" value="2,543">
                <x-slot:icon>
                    <x-stats.stat-icon icon="groups" />
                </x-slot:icon>
            </x-stats.stat-card>

            <x-stats.stat-card title="Dosen" value="132">
                <x-slot:icon>
                    <x-stats.stat-icon icon="school" />
                </x-slot:icon>
            </x-stats.stat-card>

            <x-stats.stat-card title="Program Studi" value="14">
                <x-slot:icon>
                    <x-stats.stat-icon icon="apartment" />
                </x-slot:icon>
            </x-stats.stat-card>

            <x-stats.stat-card title="Alumni" value="8,721">
                <x-slot:icon>
                    <x-stats.stat-icon icon="workspace_premium" />
                </x-slot:icon>
            </x-stats.stat-card>
        </div>

        {{-- TABEL DATA --}}
        <x-table.table>
            <x-table.toolbar>
                <div class="font-semibold">Data Mahasiswa</div>
                <div class="flex gap-2">
                    <x-table.import-button />
                    <x-table.export-button />
                    <x-button.button icon="add">Tambah</x-button.button>
                </div>
            </x-table.toolbar>

            <thead>
                <tr>
                    <x-table.th>NIM</x-table.th>
                    <x-table.th>Nama</x-table.th>
                    <x-table.th>Program Studi</x-table.th>
                    <x-table.th>Aksi</x-table.th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <x-table.td>23010001</x-table.td>
                    <x-table.td>Ahmad Fauzi</x-table.td>
                    <x-table.td>Informatika</x-table.td>
                    <x-table.td>
                        <x-table.actions>
                            <x-button.icon-button icon="visibility" />
                            <x-button.icon-button icon="edit" variant="warning" />
                            <x-button.icon-button icon="delete" variant="danger" />
                        </x-table.actions>
                    </x-table.td>
                </tr>
            </tbody>
        </x-table.table>
    </div>

    {{-- MODAL & DRAWER --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Modal & Panel Samping</h2>

        {{-- MODAL TAMBAH --}}
        <div x-data="{ openModal: false }" class="mb-6">
            <x-button.button icon="add" @click="openModal = true">
                Tambah Mahasiswa
            </x-button.button>

            <x-modal.modal x-show="openModal" @close.window="openModal = false">
                <x-slot:title>Tambah Mahasiswa</x-slot:title>
                <div class="space-y-4">
                    <x-input.input label="NIM" name="nim" />
                    <x-input.input label="Nama Mahasiswa" name="nama" />
                    <x-input.select
                        label="Program Studi"
                        name="prodi"
                        :options="[
                            'TI' => 'Teknik Informatika',
                            'SI' => 'Sistem Informasi'
                        ]"
                    />
                </div>
                <x-slot:footer>
                    <x-button.button variant="ghost" @click="openModal = false">
                        Batal
                    </x-button.button>
                    <x-button.button icon="save">Simpan</x-button.button>
                </x-slot:footer>
            </x-modal.modal>
        </div>

        {{-- MODAL KONFIRMASI --}}
        <div x-data="{ deleteModal: false, logoutModal: false, syncModal: false, backupModal: false }" class="mb-6">
            <div class="flex flex-wrap gap-3">
                <x-button.button variant="danger" icon="delete" @click="deleteModal = true">
                    Hapus Data
                </x-button.button>

                <x-button.button variant="warning" icon="logout" @click="logoutModal = true">
                    Keluar
                </x-button.button>

                <x-button.button variant="info" icon="sync" @click="syncModal = true">
                    Sinkronisasi
                </x-button.button>

                <x-button.button variant="success" icon="backup" @click="backupModal = true">
                    Backup
                </x-button.button>
            </div>

            <x-modal.confirm
                show="deleteModal"
                title="Hapus Data"
                message="Data yang dihapus tidak dapat dikembalikan."
                confirmText="Ya, Hapus"
                variant="danger"
                @confirm="alert('Data dihapus')"
            />

            <x-modal.confirm
                show="logoutModal"
                title="Keluar Sistem"
                message="Apakah Anda yakin ingin keluar dari aplikasi?"
                confirmText="Keluar"
                variant="warning"
            />

            <x-modal.confirm
                show="syncModal"
                title="Sinkronisasi Neo Feeder"
                message="Proses sinkronisasi dapat memerlukan beberapa menit."
                confirmText="Mulai Sinkronisasi"
                variant="info"
            />

            <x-modal.confirm
                show="backupModal"
                title="Backup Database"
                message="Backup database akan dibuat dan disimpan ke server."
                confirmText="Mulai Backup"
                variant="success"
            />
        </div>

        {{-- DRAWER DETAIL & TAMBAH --}}
        <div x-data="{ detailMahasiswa: false, tambahMahasiswa: false }">
            <div class="flex flex-wrap gap-3 mb-4">
                <x-button.button icon="visibility" @click="detailMahasiswa = true">
                    Lihat Detail
                </x-button.button>

                <x-button.button icon="add" @click="tambahMahasiswa = true">
                    Tambah Mahasiswa
                </x-button.button>
            </div>

            <x-modal.drawer show="detailMahasiswa" title="Detail Mahasiswa" size="lg">
                <div class="space-y-4">
                    <div>
                        <div class="text-xs text-muted">NIM</div>
                        <div class="font-medium">23010001</div>
                    </div>
                    <div>
                        <div class="text-xs text-muted">Nama Lengkap</div>
                        <div class="font-medium">Ahmad Fauzi</div>
                    </div>
                </div>
            </x-modal.drawer>

            <x-modal.drawer show="tambahMahasiswa" title="Tambah Mahasiswa" size="xl">
                <div class="space-y-4">
                    <x-input.input label="NIM" name="nim" icon="badge" />
                    <x-input.input label="Nama Lengkap" name="nama" icon="person" />
                    <x-input.input label="Email" name="email" icon="mail" />
                </div>
                <x-slot:footer>
                    <x-button.button variant="ghost" @click="tambahMahasiswa = false">
                        Batal
                    </x-button.button>
                    <x-button.button variant="success" icon="save">
                        Simpan
                    </x-button.button>
                </x-slot:footer>
            </x-modal.drawer>
        </div>
    </div>

    {{-- UKURAN IKON --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Ukuran Ikon</h2>
        <div class="flex flex-wrap items-center gap-8">
            <div class="text-center">
                <x-ui.icon name="dashboard" size="xs" />
                <p class="mt-2 text-xs">xs</p>
            </div>
            <div class="text-center">
                <x-ui.icon name="dashboard" size="sm" />
                <p class="mt-2 text-xs">sm</p>
            </div>
            <div class="text-center">
                <x-ui.icon name="dashboard" size="md" />
                <p class="mt-2 text-xs">md</p>
            </div>
            <div class="text-center">
                <x-ui.icon name="dashboard" size="lg" />
                <p class="mt-2 text-xs">lg</p>
            </div>
            <div class="text-center">
                <x-ui.icon name="dashboard" size="xl" />
                <p class="mt-2 text-xs">xl</p>
            </div>
        </div>
    </div>

    {{-- MENU SAMPING --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Contoh Menu Samping</h2>
        <div class="grid md:grid-cols-3 gap-3">
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="dashboard" /> Dashboard
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="student" /> Mahasiswa
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="lecturer" /> Dosen
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="faculty" /> Fakultas
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="program-study" /> Program Studi
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="course" /> Mata Kuliah
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="schedule" /> Jadwal Kuliah
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="attendance" /> Presensi
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="grade" /> Nilai
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="finance" /> Keuangan
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="report" /> Laporan
            </a>
            <a href="#" class="flex items-center gap-3">
                <x-ui.icon name="settings" /> Pengaturan
            </a>
        </div>
    </div>

    {{-- LINIMASA AKTIVITAS --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Linimasa Aktivitas</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <x-timeline.timeline title="Riwayat Aktivitas Mahasiswa" icon="history">
                <x-timeline.timeline-item
                    title="Registrasi Akun"
                    description="Mahasiswa berhasil mendaftar akun."
                    date="12 Juli 2026 08:15"
                    icon="person_add"
                    color="success"
                />
                <x-timeline.timeline-item
                    title="Pengisian KRS"
                    description="Mengambil 24 SKS Semester Genap."
                    date="15 Juli 2026 09:00"
                    icon="fact_check"
                    color="primary"
                />
                <x-timeline.timeline-item
                    title="Pembayaran UKT"
                    description="Pembayaran berhasil diverifikasi."
                    date="20 Juli 2026 14:35"
                    icon="payments"
                    color="success"
                />
                <x-timeline.timeline-item
                    title="Sinkronisasi Data"
                    description="Data dikirim ke Neo Feeder."
                    date="25 Juli 2026 22:10"
                    icon="sync"
                    color="info"
                />
                <x-timeline.timeline-item
                    title="Gagal Unggah Berkas"
                    description="Ukuran file melebihi batas."
                    date="26 Juli 2026 11:42"
                    icon="error"
                    color="danger"
                />
                <x-timeline.timeline-item
                    title="Menunggu Verifikasi"
                    description="Dokumen sedang diperiksa."
                    date="27 Juli 2026 07:15"
                    icon="hourglass_top"
                    color="warning"
                />
            </x-timeline.timeline>

            <x-timeline.timeline title="Log Sistem" icon="shield">
                <x-timeline.timeline-item
                    title="Login Sistem"
                    date="Hari ini, 08:00"
                    icon="login"
                    color="success"
                />
                <x-timeline.timeline-item
                    title="Ubah Data Mahasiswa"
                    description="NIM 20240001"
                    date="08:15"
                    icon="edit"
                    color="info"
                />
                <x-timeline.timeline-item
                    title="Hapus Jadwal Kuliah"
                    description="Mata kuliah Basis Data"
                    date="09:30"
                    icon="delete"
                    color="danger"
                />
            </x-timeline.timeline>
        </div>
    </div>

    {{-- TOMBOL & PERINGATAN --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Tombol & Peringatan</h2>

        <div class="space-y-5 mb-6">
            {{-- ALERT --}}
            <div class="flex flex-wrap gap-3">
                <x-alert.success>Data berhasil disimpan.</x-alert.success>
                <x-alert.error>Terjadi kesalahan sistem.</x-alert.error>
                <x-alert.warning>Pastikan data sudah benar.</x-alert.warning>
                <x-alert.info>Semester aktif: Genap 2025/2026.</x-alert.info>
            </div>

            {{-- INPUT KHUSUS --}}
            <div class="space-y-4">
                <x-input.otp name="kode_otp" label="Kode OTP" />
                <x-input.color name="warna" label="Warna Tema" />
                <x-input.editor name="konten" label="Konten Halaman" />
            </div>

            {{-- JEJAK HALAMAN --}}
            <x-ui.breadcrumb :items="['Dashboard', 'Mahasiswa', 'Tambah']" />
        </div>

        {{-- JENIS TOMBOL --}}
        <div class="flex flex-wrap gap-3 mb-6">
            <x-button.button icon="add">Tambah</x-button.button>
            <x-button.button icon="save" variant="success">Simpan</x-button.button>
            <x-button.button icon="edit" variant="warning">Ubah</x-button.button>
            <x-button.button icon="delete" variant="danger">Hapus</x-button.button>
            <x-button.button icon="search" variant="outline">Cari</x-button.button>
            <x-button.button icon="download" variant="secondary">Ekspor</x-button.button>
        </div>

        {{-- TOMBOL LOGIN SOSIAL --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-4">
            <x-button.social-login provider="google" href="/auth/google" />
            <x-button.social-login provider="github" href="/auth/github" />
            <x-button.social-login provider="facebook" href="/auth/facebook" />
            <x-button.social-login provider="microsoft" href="/auth/microsoft" />
        </div>

        <x-button.social-share
            url="https://siakad.kampus.ac.id"
            title="SIAKAD Kampus"
        />
    </div>

    {{-- INPUT PENCARIAN --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Kolom Pencarian</h2>
        <div class="relative max-w-md">
            <x-ui.icon
                name="search"
                class="absolute left-3 top-3 text-muted"
            />
            <input
                type="text"
                placeholder="Cari mahasiswa, dosen, dll..."
                class="w-full pl-10 pr-4 py-2 border border-card-border rounded-lg bg-background"
            >
        </div>
    </div>

    {{-- CONTOH KARTU DASHBOARD --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Contoh Kartu Ringkasan</h2>
        <div class="grid md:grid-cols-4 gap-4">
            <div class="rounded-xl border border-card-border p-5">
                <div class="flex items-center gap-3">
                    <x-ui.icon name="student" size="xl" class="text-brand-600" />
                    <div>
                        <p class="text-muted text-sm">Mahasiswa</p>
                        <h3 class="font-bold text-lg">1.250</h3>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-card-border p-5">
                <div class="flex items-center gap-3">
                    <x-ui.icon name="lecturer" size="xl" class="text-green-600" />
                    <div>
                        <p class="text-muted text-sm">Dosen</p>
                        <h3 class="font-bold text-lg">95</h3>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-card-border p-5">
                <div class="flex items-center gap-3">
                    <x-ui.icon name="course" size="xl" class="text-blue-600" />
                    <div>
                        <p class="text-muted text-sm">Mata Kuliah</p>
                        <h3 class="font-bold text-lg">182</h3>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-card-border p-5">
                <div class="flex items-center gap-3">
                    <x-ui.icon name="finance" size="xl" class="text-orange-600" />
                    <div>
                        <p class="text-muted text-sm">Pembayaran</p>
                        <h3 class="font-bold text-lg">Rp 120 Jt</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- INDIKATOR STATUS --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Indikator Status</h2>
        <div class="flex flex-wrap gap-6">
            <div class="flex items-center gap-2 text-green-600">
                <x-ui.icon name="security" /> Aktif
            </div>
            <div class="flex items-center gap-2 text-yellow-600">
                <x-ui.icon name="notification" /> Menunggu
            </div>
            <div class="flex items-center gap-2 text-red-600">
                <x-ui.icon name="delete" /> Nonaktif
            </div>
        </div>
    </div>

    {{-- DAFTAR LENGKAP IKON --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">Daftar Lengkap Ikon</h2>
        <div class="grid md:grid-cols-4 gap-4 text-sm">
            @foreach([
                'dashboard', 'home', 'analytics', 'monitoring',
                'student', 'students', 'graduate', 'alumni',
                'lecturer', 'teacher', 'advisor',
                'faculty', 'program-study', 'course',
                'curriculum', 'classroom',
                'schedule', 'calendar',
                'attendance', 'grade',
                'exam', 'transcript',
                'krs', 'khs', 'thesis',
                'graduation', 'finance',
                'payment', 'invoice',
                'wallet', 'scholarship',
                'employee', 'staff',
                'users', 'role',
                'permission', 'document',
                'folder', 'upload',
                'download', 'print',
                'report', 'chart',
                'statistics', 'notification',
                'announcement', 'mail',
                'add', 'edit',
                'save', 'delete',
                'search', 'filter',
                'refresh', 'copy',
                'share', 'settings',
                'security', 'backup',
                'database', 'login',
                'logout', 'password'
            ] as $icon)
                <div class="flex items-center gap-2">
                    <x-ui.icon name="{{ $icon }}" />
                    <span>{{ $icon }}</span>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
