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

    {{-- BUTTON --}}
    <div class="rounded-xl border border-card-border bg-card p-5">

        <h2 class="mb-4 font-semibold">
            Tombol
        </h2>

        <div class="flex flex-wrap gap-3">

            <x-button.button icon="add">
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
                class="w-full pl-10 pr-4 py-2 border rounded-lg"
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

                <div class="flex items-center gap-3">
                    <x-icon name="{{ $icon }}" />
                    <span>{{ $icon }}</span>
                </div>

            @endforeach

        </div>

    </div>

</div>

@endsection