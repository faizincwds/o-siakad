@extends('layouts.app')

@section('title', 'Pengaturan Umum')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

        <!-- FORM 1: Identitas Perguruan Tinggi -->
        <form method="POST" action="{{ Route::has('settings.identity.update') ? route('settings.identity.update') : '#' }}" class="bg-card border border-card-border rounded-lg p-8 transition-colors duration-300">
            @csrf
            @method('PUT')

            <h3 class="font-display flex items-center gap-1 font-bold text-foreground text-sm mb-4">
                <span class="material-icons-outlined icon-md text-muted mr-2">apartment</span>
                Identitas Perguruan Tinggi
            </h3>

            <div class="space-y-3">
                <x-input name="nama_pt" label="Nama PT" value="Universitas Nusantara Mandiri" />
                <x-input name="npsn" label="NSPN" value="0210250" />
                <x-input name="akreditasi" label="Akreditasi" value="Unggul (SK BAN-PT No. 1234/SK/BAN-PT/Ak-PPJ/)" />
                <x-input name="alamat" label="Alamat" value="Jl. Pendidikan No. 45, Jakarta Selatan" />
                <x-input name="kode_pos" label="Kode Pos" value="12345" />
                <x-input name="telepon" label="Telepon" value="(021) 7890-1234" />
                <x-input name="fax" label="Fax" value="(021) 7890-1235" />
                <x-input name="website" label="Website" value="www.unima.ac.id" />
                <x-input name="email_pt" type="email" label="Email" value="info@unima.ac.id" />
            </div>

            <x-button type="submit" variant="primary" size="sm" icon="save" class="mt-4">
                Simpan Perubahan
            </x-button>
        </form>

        <!-- KOLOM KANAN -->
        <div class="space-y-5">

            <!-- FORM 2: Akun Pengguna -->
            <form method="POST" action="{{ Route::has('settings.profile.update') ? route('settings.profile.update') : '#' }}" class="bg-card border border-card-border rounded-lg p-8 transition-colors duration-300">
                @csrf
                @method('PUT')

                <h3 class="flex items-center gap-1 font-display font-bold text-foreground text-sm mb-4">
                    <span class="material-icons-outlined icon-md text-muted">admin_panel_settings</span>
                    Akun Pengguna
                </h3>

                <div class="space-y-3">
                    <x-input name="username" label="Username" value="admin.unima" />
                    <x-input name="nama_lengkap" label="Nama Lengkap" value="Dr. Ahmad Fauzi, M.Kom." />
                    <x-input name="email_user" type="email" label="Email" value="ahmad.fauzi@unima.ac.id" />

                    <!-- Input Readonly: Class opacity-60 dan cursor-not-allowed akan digabung otomatis oleh $attributes->merge -->
                    <x-input name="role" label="Role" value="Administrator" readonly class="opacity-60 cursor-not-allowed" />
                    <x-input name="last_login" label="Terakhir Login" value="05 Mei 2026, 07:30 WIB" readonly class="opacity-60 cursor-not-allowed" />
                </div>

                <x-button type="submit" variant="primary" size="sm" icon="person" class="mt-4">
                    Perbarui Profil
                </x-button>
            </form>

            <!-- FORM 3: Ubah Password -->
            <form method="POST" action="{{ Route::has('settings.password.update') ? route('settings.password.update') : '#' }}" class="bg-card border border-card-border rounded-lg p-8 transition-colors duration-300">
                @csrf
                @method('PUT')

                <h3 class="font-display font-bold text-foreground text-sm mb-4 flex items-center">
                    <span class="material-icons-outlined icon-md text-muted mr-2">key</span>
                    Ubah Password
                </h3>

                <div class="space-y-3">
                    <!-- Tidak menggunakan value karena ini input password kosong -->
                    <x-input name="password_lama" type="password" label="Password Lama" placeholder="Masukkan password lama" />
                    <x-input name="password_baru" type="password" label="Password Baru" placeholder="Masukkan password baru" />
                    <x-input name="password_konfirmasi" type="password" label="Konfirmasi Password" placeholder="Masukkan konfirmasi password" />
                </div>

                <x-button type="submit" variant="primary" size="sm" icon="lock" class="mt-4">
                    Ubah Password
                </x-button>
            </form>

        </div>
    </div>
@endsection
