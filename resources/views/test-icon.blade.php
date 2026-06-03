@extends('layouts.auth')

@section('title', 'Component In')

@section('content')

<div class="p-6 space-y-8">

    {{-- HEADER --}}
    <div>
        <h1 class="text-2xl font-bold">
            Demo Komponen Icon SIAKAD
        </h1>

        <p class="text-muted mt-2">
            Referensi penggunaan seluruh icon yang tersedia.
        </p>
    </div>

    {{-- UKURAN --}}
    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">
            Ukuran Icon
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

    <x-chart.line
        title="Grafik Mahasiswa Baru"
        :categories="['2021','2022','2023','2024','2025']"
        :series="[
            [
                'name' => 'Mahasiswa',
                'data' => [120,150,180,210,250]
            ]
        ]"
    />

    <x-chart.bar
        title="Mahasiswa per Fakultas"
        :categories="[
            'FT',
            'FEB',
            'FKIP',
            'FAI'
        ]"
        :series="[
            [
                'name'=>'Jumlah',
                'data'=>[250,180,150,120]
            ]
        ]"
    />

    <x-chart.pie
        title="Status Mahasiswa"
        :labels="[
            'Aktif',
            'Cuti',
            'Lulus'
        ]"
        :series="[850,50,200]"
    />

    <x-chart.donut
        title="Pembayaran UKT"
        :labels="[
            'Lunas',
            'Belum Lunas'
        ]"
        :series="[780,120]"
    />

</div>

    </div>

    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">
            Ukuran Icon
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">

    <x-widget.feeder-status />

    <x-widget.system-health />

    <x-widget.calendar />

    <x-widget.quick-menu />

</div>

<div class="mt-5">

    <x-widget.activity />

</div>

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


    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">
            Ukuran Icon
        </h2>
        <div
    x-data="{
        role:'administrator'
    }"
    class="grid lg:grid-cols-4 gap-5"
>

    {{-- ROLE LIST --}}
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

    {{-- PERMISSION --}}
    <div class="lg:col-span-3">

        <x-permission.permission-group
            title="Permission Matrix"
            icon="shield"
        >

            <x-permission.permission-matrix
                :modules="[
                    'Dashboard',
                    'Mahasiswa',
                    'Dosen',
                    'Program Studi',
                    'Mata Kuliah',
                    'KRS',
                    'KHS',
                    'Jadwal Kuliah',
                    'PMB',
                    'Keuangan',
                    'Neo Feeder',
                    'Pengguna',
                    'Settings'
                ]"
            />

        </x-permission.permission-group>

        <div class="flex justify-end mt-4">

            <x-button.button
                icon="save"
                variant="success"
            >
                Simpan Permission
            </x-button.button>

        </div>

    </div>

</div>
    </div>

    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">
            Academic Calendar
        </h2>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-5">

    <x-academic.krs-card
        semester="Genap 2025/2026"
        sks="24"
        status="Disetujui"
    >
        <x-button.button
            size="sm"
            icon="visibility"
        >
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


    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">
            STATUS
        </h2>

        {{-- STATS --}}

<div class="grid md:grid-cols-2 xl:grid-cols-4 gap-5 mb-5">

    <x-stats.stat-card
        title="Mahasiswa Aktif"
        value="2,543"
    >
        <x-slot:icon>
            <x-stats.stat-icon
                icon="groups"
            />
        </x-slot:icon>
    </x-stats.stat-card>

    <x-stats.stat-card
        title="Dosen"
        value="132"
    >
        <x-slot:icon>
            <x-stats.stat-icon
                icon="school"
            />
        </x-slot:icon>
    </x-stats.stat-card>

    <x-stats.stat-card
        title="Prodi"
        value="14"
    >
        <x-slot:icon>
            <x-stats.stat-icon
                icon="apartment"
            />
        </x-slot:icon>
    </x-stats.stat-card>

    <x-stats.stat-card
        title="Alumni"
        value="8,721"
    >
        <x-slot:icon>
            <x-stats.stat-icon
                icon="workspace_premium"
            />
        </x-slot:icon>
    </x-stats.stat-card>

</div>


{{-- TABLE --}}

<x-table.table>

    <x-table.toolbar>

        <div class="font-semibold">
            Data Mahasiswa
        </div>

        <div class="flex gap-2">

            <x-table.import-button />

            <x-table.export-button />

            <x-button.button
                icon="add"
            >
                Tambah
            </x-button.button>

        </div>

    </x-table.toolbar>

    <thead>

        <tr>

            <x-table.th>NIM</x-table.th>
            <x-table.th>Nama</x-table.th>
            <x-table.th>Prodi</x-table.th>
            <x-table.th>Aksi</x-table.th>

        </tr>

    </thead>

    <tbody>

        <tr>

            <x-table.td>23010001</x-table.td>

            <x-table.td>
                Ahmad Fauzi
            </x-table.td>

            <x-table.td>
                Informatika
            </x-table.td>

            <x-table.td>

                <x-table.actions>

                    <x-button.icon-button
                        icon="visibility"
                    />

                    <x-button.icon-button
                        icon="edit"
                        variant="warning"
                    />

                    <x-button.icon-button
                        icon="delete"
                        variant="danger"
                    />

                </x-table.actions>

            </x-table.td>

        </tr>

    </tbody>

</x-table.table>

</div>

    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">
            MODAL
        </h2>

        <div x-data="{ openModal:false }">

            <x-button.button
                icon="add"
                @click="openModal = true"
            >
                Tambah Mahasiswa
            </x-button.button>

            <x-modal.modal
                x-show="openModal"
                @close.window="openModal = false"
            >

                <x-slot:title>
                    Tambah Mahasiswa
                </x-slot:title>

                <div class="space-y-4">

                    <x-input.input
                        label="NIM"
                        name="nim"
                    />

                    <x-input.input
                        label="Nama Mahasiswa"
                        name="nama"
                    />

                    <x-input.select
                        label="Program Studi"
                        name="prodi"
                        :options="[
                            'TI'=>'Teknik Informatika',
                            'SI'=>'Sistem Informasi'
                        ]"
                    />

                </div>

                <x-slot:footer>

                    <x-button.button
                        variant="ghost"
                        @click="openModal = false"
                    >
                        Batal
                    </x-button.button>

                    <x-button.button
                        icon="save"
                    >
                        Simpan
                    </x-button.button>

                </x-slot:footer>

            </x-modal.modal>

        </div>

<div x-data="{ deleteModal:false }">

    <x-button.button
        variant="danger"
        icon="delete"
        @click="deleteModal=true"
    >
        Hapus
    </x-button.button>

    <x-modal.confirm
        show="deleteModal"
        title="Hapus Data"
        message="Data yang dihapus tidak dapat dikembalikan."
        confirmText="Ya, Hapus"
        variant="danger"
        @click="alert('hapus data')"
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
        message="Backup database akan dibuat dan disimpan ke storage server."
        confirmText="Mulai Backup"
        variant="success"
    />



</div>


<div x-data="{ detailMahasiswa:false }">

    <x-button.button
        icon="visibility"
        @click="detailMahasiswa=true"
    >
        Detail
    </x-button.button>

    <x-modal.drawer
        show="detailMahasiswa"
        title="Detail Mahasiswa"
        size="lg"
    >

        <div class="space-y-4">

            <div>
                <div class="text-xs text-muted">
                    NIM
                </div>

                <div class="font-medium">
                    23010001
                </div>
            </div>

            <div>
                <div class="text-xs text-muted">
                    Nama
                </div>

                <div class="font-medium">
                    Ahmad Fauzi
                </div>
            </div>

        </div>

    </x-modal.drawer>

</div>

<div x-data="{ tambahMahasiswa:false }">

    <x-button.button
        icon="add"
        @click="tambahMahasiswa=true"
    >
        Tambah Mahasiswa
    </x-button.button>

    <x-modal.drawer
        show="tambahMahasiswa"
        title="Tambah Mahasiswa"
        size="xl"
    >

        <div class="space-y-4">

            <x-input.input
                label="NIM"
                name="nim"
                icon="badge"
            />

            <x-input.input
                label="Nama Mahasiswa"
                name="nama"
                icon="person"
            />

            <x-input.input
                label="Email"
                name="email"
                icon="mail"
            />

        </div>

        <x-slot:footer>

            <x-button.button
                variant="ghost"
                @click="tambahMahasiswa=false"
            >
                Batal
            </x-button.button>

            <x-button.button
                variant="success"
                icon="save"
            >
                Simpan
            </x-button.button>

        </x-slot:footer>

    </x-modal.drawer>

</div>


    </div>

    <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">
            contoh modal lengkap
        </h2>



    </div>

     <div class="rounded-xl border border-card-border bg-card p-5">
        <h2 class="mb-4 font-semibold">
            Ukuran Icon
        </h2>

        <div class="flex items-center gap-8">

            <div class="text-center">
                <x-icon name="dashboard" size="xs"/>
                <p class="mt-2 text-xs">xs</p>
            </div>

            <div class="text-center">
                <x-icon name="dashboard" size="sm"/>
                <p class="mt-2 text-xs">sm</p>
            </div>

            <div class="text-center">
                <x-icon name="dashboard" size="md"/>
                <p class="mt-2 text-xs">md</p>
            </div>

            <div class="text-center">
                <x-icon name="dashboard" size="lg"/>
                <p class="mt-2 text-xs">lg</p>
            </div>

            <div class="text-center">
                <x-icon name="dashboard" size="xl"/>
                <p class="mt-2 text-xs">xl</p>
            </div>

        </div>
    </div>

    {{-- SIDEBAR MENU --}}
    <div class="rounded-xl border border-card-border bg-card p-5">

        <h2 class="mb-4 font-semibold">
            Sidebar Menu
        </h2>

        <div class="grid md:grid-cols-3 gap-3">

            <a href="#" class="flex items-center gap-3">
                <x-icon name="dashboard"/>
                Dashboard
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="student"/>
                Mahasiswa
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="lecturer"/>
                Dosen
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="faculty"/>
                Fakultas
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="program-study"/>
                Program Studi
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="course"/>
                Mata Kuliah
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="schedule"/>
                Jadwal Kuliah
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="attendance"/>
                Presensi
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="grade"/>
                Nilai
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="finance"/>
                Keuangan
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="report"/>
                Laporan
            </a>

            <a href="#" class="flex items-center gap-3">
                <x-icon name="settings"/>
                Pengaturan
            </a>

        </div>

    </div>

    <div class="rounded-xl border border-card-border bg-card p-5">

        <h2 class="mb-4 font-semibold">
            Timeline Item
        </h2>

        <div class="grid md:grid-cols-4 gap-4">

            <div class="flex flex-wrap gap-3 mb-4">
                <x-timeline.timeline
                    title="Riwayat Aktivitas Mahasiswa"
                    icon="history"
                >

                    <x-timeline.timeline-item
                        title="Registrasi Mahasiswa"
                        description="Mahasiswa berhasil melakukan registrasi akun."
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
                        title="Sinkronisasi Neo Feeder"
                        description="Data berhasil dikirim ke Neo Feeder."
                        date="25 Juli 2026 22:10"
                        icon="sync"
                        color="info"
                    />

                    <x-timeline.timeline-item
                        title="Gagal Upload Berkas"
                        description="Ukuran file melebihi batas maksimal."
                        date="26 Juli 2026 11:42"
                        icon="error"
                        color="danger"
                    />

                    <x-timeline.timeline-item
                        title="Menunggu Verifikasi"
                        description="Dokumen sedang diperiksa oleh operator akademik."
                        date="27 Juli 2026 07:15"
                        icon="hourglass_top"
                        color="warning"
                    />

                </x-timeline.timeline>
            </div>

            <div class="flex flex-wrap gap-3 mb-4">
                <x-timeline.timeline
                    title="Audit Trail"
                    icon="shield"
                >

                    <x-timeline.timeline-item
                        title="Login Sistem"
                        date="Hari ini, 08:00"
                        icon="login"
                        color="success"
                    />

                    <x-timeline.timeline-item
                        title="Mengubah Data Mahasiswa"
                        description="Mengedit biodata mahasiswa NIM 20240001"
                        date="08:15"
                        icon="edit"
                        color="info"
                    />

                    <x-timeline.timeline-item
                        title="Menghapus Jadwal"
                        description="Jadwal Kuliah Basis Data"
                        date="09:30"
                        icon="delete"
                        color="danger"
                    />

                </x-timeline.timeline>
            </div>
        </div>
    </div>

    {{-- BUTTON --}}
    <div class="rounded-xl border border-card-border bg-card p-5">

        <h2 class="mb-4 font-semibold">
            Tombol
        </h2>



        <div class="flex flex-wrap gap-3 mb-4">
            <x-alert.success>
                Data berhasil disimpan.
            </x-alert.success>

            <x-alert.error>
                Terjadi kesalahan saat menyimpan data.
            </x-alert.error>

            <x-alert.warning>
                Pastikan semua data sudah benar.
            </x-alert.warning>

            <x-alert.info>
                Semester aktif saat ini adalah Genap 2025/2026.
            </x-alert.info>

                <div class="space-y-5">

                    <x-input.otp
                        name="kode_otp"
                        label="Kode OTP"
                    />

                    <x-input.color
                        name="warna"
                        label="Warna Tema"
                    />

                    <x-input.editor
                        name="konten"
                        label="Konten Website"
                    />

                </div>

            <x-ui.breadcrumb
                :items="[
                    'Dashboard',
                    'Mahasiswa',
                    'Tambah'
                ]"
            />
        </div>

        <div class="flex flex-wrap gap-3">

            <x-button.button
                icon="add">
                Tambah
            </x-button.button>

            <x-button.button
                icon="save"
                variant="success">
                Simpan
            </x-button.button>

            <x-button.button
                icon="edit"
                variant="warning">
                Edit
            </x-button.button>

            <x-button.button
                icon="delete"
                variant="danger">
                Hapus
            </x-button.button>

            <x-button.button
                icon="search"
                variant="outline">
                Cari
            </x-button.button>

            <x-button.button
                icon="download"
                variant="secondary">
                Export
            </x-button.button>

        </div>

        <div class="grid gap-3">

    <x-button.social-login
        provider="google"
        href="/auth/google"
    />

    <x-button.social-login
        provider="github"
        href="/auth/github"
    />

    <x-button.social-login
        provider="facebook"
        href="/auth/facebook"
    />

    <x-button.social-login
        provider="microsoft"
        href="/auth/microsoft"
    />

</div>

<x-button.social-share
    url="https://siakad.kampus.ac.id"
    title="SIAKAD STITUSA"
/>

    </div>

    {{-- SEARCH --}}
    <div class="rounded-xl border border-card-border bg-card p-5">

        <h2 class="mb-4 font-semibold">
            Input Search
        </h2>

        <div class="relative max-w-md">

            <x-icon
                name="search"
                class="absolute left-3 top-3 text-muted"
            />

            <input
                type="text"
                placeholder="Cari mahasiswa..."
                class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg"
            >

        </div>

    </div>

    {{-- DASHBOARD CARD --}}
    <div class="rounded-xl border border-card-border bg-card p-5">

        <h2 class="mb-4 font-semibold">
            Dashboard Card
        </h2>

        <div class="grid md:grid-cols-4 gap-4">

            <div class="rounded-xl border border-card-border p-5">
                <div class="flex items-center gap-3">

                    <x-icon
                        name="student"
                        size="xl"
                        class="text-brand-600"
                    />

                    <div>
                        <p class="text-muted text-sm">
                            Mahasiswa
                        </p>

                        <h3 class="font-bold">
                            1.250
                        </h3>
                    </div>

                </div>
            </div>

            <div class="rounded-xl border border-card-border p-5">
                <div class="flex items-center gap-3">

                    <x-icon
                        name="lecturer"
                        size="xl"
                        class="text-green-600"
                    />

                    <div>
                        <p class="text-muted text-sm">
                            Dosen
                        </p>

                        <h3 class="font-bold">
                            95
                        </h3>
                    </div>

                </div>
            </div>

            <div class="rounded-xl border border-card-border p-5">
                <div class="flex items-center gap-3">

                    <x-icon
                        name="course"
                        size="xl"
                        class="text-blue-600"
                    />

                    <div>
                        <p class="text-muted text-sm">
                            Mata Kuliah
                        </p>

                        <h3 class="font-bold">
                            182
                        </h3>
                    </div>

                </div>
            </div>

            <div class="rounded-xl border border-card-border p-5">
                <div class="flex items-center gap-3">

                    <x-icon
                        name="finance"
                        size="xl"
                        class="text-orange-600"
                    />

                    <div>
                        <p class="text-muted text-sm">
                            Pembayaran
                        </p>

                        <h3 class="font-bold">
                            Rp 120 Jt
                        </h3>
                    </div>

                </div>
            </div>

        </div>

    </div>

    {{-- STATUS --}}
    <div class="rounded-xl border border-card-border bg-card p-5">

        <h2 class="mb-4 font-semibold">
            Status
        </h2>

        <div class="flex flex-wrap gap-6">

            <div class="flex items-center gap-2 text-green-600">
                <x-icon name="security"/>
                Aktif
            </div>

            <div class="flex items-center gap-2 text-yellow-600">
                <x-icon name="notification"/>
                Menunggu
            </div>

            <div class="flex items-center gap-2 text-red-600">
                <x-icon name="delete"/>
                Nonaktif
            </div>

        </div>

    </div>

    {{-- ICON REFERENCE --}}
    <div class="rounded-xl border border-card-border bg-card p-5">

        <h2 class="mb-4 font-semibold">
            Referensi Semua Icon
        </h2>

        <div class="grid md:grid-cols-4 gap-4 text-sm">

            @foreach([
                'dashboard','home','analytics','monitoring',
                'student','students','graduate','alumni',
                'lecturer','teacher','advisor',
                'faculty','program-study','course',
                'curriculum','classroom',
                'schedule','calendar',
                'attendance','grade',
                'exam','transcript',
                'krs','khs','thesis',
                'graduation','finance',
                'payment','invoice',
                'wallet','scholarship',
                'employee','staff',
                'users','role',
                'permission','document',
                'folder','upload',
                'download','print',
                'report','chart',
                'statistics','notification',
                'announcement','mail',
                'add','edit',
                'save','delete',
                'search','filter',
                'refresh','copy',
                'share','settings',
                'security','backup',
                'database','login',
                'logout','password'
            ] as $icon)

                <div class="flex items-center gap-2">
                    <x-icon name="{{ $icon }}" />
                    <span>{{ $icon }}</span>
                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection
