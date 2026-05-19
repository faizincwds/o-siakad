@extends('layouts.app')
@section('title', 'Profil')
@section('content')
<x-page-header :breadcrumbs="$breadcrumbs" :title="$pageTitle" :description="$pageDescription" :icon="$pageIcon" />

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    {{-- Left Column: Identitas PT --}}
    <div class="card bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title text-lg">
                <span class="material-icons text-primary">account_balance</span>
                Identitas PT
            </h2>
            <div class="divider mt-0"></div>
            <div class="space-y-4">
                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Nama Perguruan Tinggi</span></label>
                    <input type="text" value="Universitas Nusantara Mandiri" class="input input-bordered" readonly />
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">NSPN</span></label>
                    <input type="text" value="0210250" class="input input-bordered" readonly />
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Akreditasi</span></label>
                    <input type="text" value="Unggul" class="input input-bordered" readonly />
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Tanggal Berdiri</span></label>
                    <input type="text" value="15 Agustus 1985" class="input input-bordered" readonly />
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Alamat</span></label>
                    <textarea class="textarea textarea-bordered" readonly>Jl. Pendidikan No. 45, Jakarta Selatan</textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Kode Pos</span></label>
                        <input type="text" value="12345" class="input input-bordered" readonly />
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Telepon</span></label>
                        <input type="text" value="(021) 7890-1234" class="input input-bordered" readonly />
                    </div>
                </div>
                <div class="form-control">
                    <label class="label"><span class="label-text font-medium">Fax</span></label>
                    <input type="text" value="(021) 7890-1235" class="input input-bordered" readonly />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Website</span></label>
                        <input type="text" value="www.unima.ac.id" class="input input-bordered" readonly />
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Email</span></label>
                        <input type="text" value="info@unima.ac.id" class="input input-bordered" readonly />
                    </div>
                </div>
            </div>
            <div class="card-actions justify-end mt-4">
                <button class="btn btn-primary">
                    <span class="material-icons text-sm">save</span>
                    Simpan
                </button>
            </div>
        </div>
    </div>

    {{-- Right Column --}}
    <div class="space-y-6">
        {{-- Akun Pengguna --}}
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-lg">
                    <span class="material-icons text-primary">person</span>
                    Akun Pengguna
                </h2>
                <div class="divider mt-0"></div>
                <div class="flex items-center gap-4 mb-4">
                    <div class="avatar placeholder">
                        <div class="bg-primary text-primary-content w-16 rounded-full">
                            <span class="text-xl">AF</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-semibold text-lg">Dr. Ahmad Fauzi M.Kom.</h3>
                        <span class="badge badge-primary">Administrator</span>
                    </div>
                </div>
                <div class="space-y-3">
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Username</span></label>
                        <input type="text" value="admin.unima" class="input input-bordered" readonly />
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Email</span></label>
                        <input type="email" value="ahmad.fauzi@unima.ac.id" class="input input-bordered" readonly />
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Role</span></label>
                        <input type="text" value="Administrator" class="input input-bordered" readonly />
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Login Terakhir</span></label>
                        <input type="text" value="04 Maret 2026, 08:30 WIB" class="input input-bordered" readonly />
                    </div>
                </div>
            </div>
        </div>

        {{-- Ubah Password --}}
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title text-lg">
                    <span class="material-icons text-primary">lock</span>
                    Ubah Password
                </h2>
                <div class="divider mt-0"></div>
                <div class="space-y-3">
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Password Lama</span></label>
                        <input type="password" placeholder="Masukkan password lama" class="input input-bordered" />
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Password Baru</span></label>
                        <input type="password" placeholder="Masukkan password baru" class="input input-bordered" />
                    </div>
                    <div class="form-control">
                        <label class="label"><span class="label-text font-medium">Konfirmasi Password Baru</span></label>
                        <input type="password" placeholder="Ulangi password baru" class="input input-bordered" />
                    </div>
                </div>
                <div class="card-actions justify-end mt-4">
                    <button class="btn btn-primary">
                        <span class="material-icons text-sm">vpn_key</span>
                        Ubah Password
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
