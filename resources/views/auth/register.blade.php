@extends('layouts.auth')

@section('title', 'Daftar Akun Baru')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Buat Akun Mahasiswa</h2>

    <form method="POST" action="{{ route('register') ? route('register') : '#' }}" class="space-y-4">
        @csrf

        <x-input name="name" type="text" label="Nama Lengkap" placeholder="John Doe" />
        <x-input name="email" type="email" label="Email Address" placeholder="nama@universitas.ac.id" />
        <x-input name="password" type="password" label="Password" placeholder="••••••••" />
        <x-input name="password_confirmation" type="password" label="Konfirmasi Password" placeholder="••••••••" />

        <button type="submit" class="w-full bg-primary hover:bg-blue-600 text-white font-bold py-2.5 rounded-lg transition-colors shadow-md mt-2">
            Daftar Sekarang
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            Sudah punya akun?
            <a href="{{ route('login') ? route('login') : '#' }}" class="font-medium text-primary hover:underline">Login disini</a>
        </p>
    </div>
</div>
@endsection
