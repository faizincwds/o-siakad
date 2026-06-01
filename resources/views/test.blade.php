@extends('layouts.auth')

@section('title', 'Component In')

@section('content')


<div class="mx-auto max-w-5xl p-6">

    <div class="mb-6">
        <h1>UI Components Demo</h1>
        <p class="text-muted">
            Demo seluruh komponen SIAKAD
        </p>
    </div>

    <form action="#" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="rounded-xl border border-card-border bg-card p-6">

            <h3 class="mb-6">
                Data Mahasiswa
            </h3>

            <div class="grid gap-5 md:grid-cols-2">

                {{-- Input --}}
                <x-input.input
                    name="nim"
                    label="NIM"
                    placeholder="Masukkan NIM"
                />

                <x-input.input
                    name="nama"
                    label="Nama Mahasiswa"
                    placeholder="Masukkan Nama"
                />

                {{-- Phone --}}
                <x-input.phone
                    name="telepon"
                />

                {{-- Currency --}}
                <x-input.currency
                    name="biaya"
                />

                {{-- Date --}}
                <x-input.date
                    name="tanggal_lahir"
                />

                {{-- Datetime --}}
                <x-input.datetime
                    name="jadwal"
                />

                {{-- Select --}}
                <x-input.select
                    name="program_studi"
                    label="Program Studi"
                    :options="[
                        'PGMI' => 'PGMI',
                        'MPI' => 'MPI',
                        'PAI' => 'PAI',
                    ]"
                />

                {{-- Search --}}
                <x-input.search
                    name="search"
                    placeholder="Cari mahasiswa..."
                />

            </div>

            {{-- Textarea --}}
            <div class="mt-5">
                <x-input.textarea
                    name="alamat"
                    label="Alamat"
                    rows="4"
                />
            </div>

            {{-- Checkbox --}}
            <div class="mt-5">
                <x-input.checkbox
                    name="aktif"
                    label="Mahasiswa Aktif"
                />
            </div>

            {{-- Radio --}}
            <div class="mt-5">

                <label class="mb-2 block text-sm font-medium">
                    Jenis Kelamin
                </label>

                <div class="flex gap-5">

                    <x-input.radio
                        name="jk"
                        value="L"
                        label="Laki-laki"
                    />

                    <x-input.radio
                        name="jk"
                        value="P"
                        label="Perempuan"
                    />

                </div>

            </div>

            {{-- Switch --}}
            <div class="mt-5">

                <x-input.switch
                    name="status"
                    label="Aktifkan Akun"
                />

            </div>

            {{-- Upload File --}}
            <div class="mt-5">

                <label class="mb-2 block text-sm font-medium">
                    Upload Dokumen
                </label>

                <x-input.file
                    name="dokumen"
                />

            </div>

            {{-- Upload Gambar --}}
            <div class="mt-5">

                <label class="mb-2 block text-sm font-medium">
                    Foto Mahasiswa
                </label>

                <x-input.image-upload
                    name="foto"
                />

            </div>

            {{-- Select Search --}}
            <div class="mt-5">

                <label class="mb-2 block text-sm font-medium">
                    Dosen Wali
                </label>

                <x-input.select-search
                    :options="[
                        1 => 'Dr. Ahmad',
                        2 => 'Dr. Siti',
                        3 => 'Dr. Yusuf',
                        4 => 'Dr. Nur',
                    ]"
                />

            </div>

            {{-- Select Async --}}
            <div class="mt-5">

                <label class="mb-2 block text-sm font-medium">
                    Cari Mahasiswa (AJAX)
                </label>

                <x-input.select-async
                    url="/api/mahasiswa/search"
                />

            </div>

        </div>

        {{-- BUTTONS --}}
        <div class="mt-8 rounded-xl border border-card-border bg-card p-6">

            <h3 class="mb-5">
                Buttons
            </h3>

            <div class="flex flex-wrap gap-3">

                <x-button.button
                    icon="save"
                >
                    Simpan
                </x-button.button>

                <x-button.button
                    variant="success"
                    icon="check"
                >
                    Publish
                </x-button.button>

                <x-button.button
                    variant="warning"
                    icon="edit"
                >
                    Edit
                </x-button.button>

                <x-button.button
                    variant="danger"
                    icon="delete"
                >
                    Hapus
                </x-button.button>

                <x-button.button
                    variant="outline"
                    icon="download"
                >
                    Export
                </x-button.button>

                <x-button.button
                    variant="ghost"
                    icon="visibility"
                >
                    Preview
                </x-button.button>

            </div>

            <hr class="my-6 border-card-border">

            {{-- Icon Button --}}
            <div class="flex gap-3">

                <x-button.icon-button
                    icon="edit"
                    variant="warning"
                />

                <x-button.icon-button
                    icon="delete"
                    variant="danger"
                />

                <x-button.icon-button
                    icon="visibility"
                    variant="secondary"
                />

            </div>

            <hr class="my-6 border-card-border">

            {{-- Link Button --}}
            <div class="flex flex-wrap gap-3">

                <x-button.button-link
                    href="#"
                    icon="add"
                >
                    Tambah Mahasiswa
                </x-button.button-link>

                <x-button.button-link
                    href="#"
                    variant="outline"
                    icon="download"
                >
                    Export Excel
                </x-button.button-link>

            </div>

            <hr class="my-6 border-card-border">

            {{-- Dropdown --}}
            <div class="flex gap-3">

                <x-button.dropdown-button text="Aksi">

                    <a
                        href="#"
                        class="block px-4 py-2 hover:bg-surface"
                    >
                        Detail
                    </a>

                    <a
                        href="#"
                        class="block px-4 py-2 hover:bg-surface"
                    >
                        Edit
                    </a>

                    <a
                        href="#"
                        class="block px-4 py-2 hover:bg-surface text-red-500"
                    >
                        Hapus
                    </a>

                </x-button.dropdown-button>

                {{-- Split Button --}}
                <x-button.split-button text="Simpan">

                    <button
                        type="button"
                        class="block w-full px-4 py-2 text-left hover:bg-surface"
                    >
                        Simpan & Kembali
                    </button>

                    <button
                        type="button"
                        class="block w-full px-4 py-2 text-left hover:bg-surface"
                    >
                        Simpan & Tambah Baru
                    </button>

                </x-button.split-button>
    

            </div>

        </div>

    </form>

</div>



@endsection