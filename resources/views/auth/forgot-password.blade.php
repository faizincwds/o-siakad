@extends('layouts.auth')

@section('title', 'Login - e-SIAKAD')

@section('content')
<div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Masuk ke Akun</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <x-input name="email" type="email" label="Email Address" placeholder="nama@universitas.ac.id" />
        <x-input name="password" type="password" label="Password" placeholder="••••••••" />

        <div class="flex items-center justify-between mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                <span class="ml-2 text-sm text-gray-600">Ingat Saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-primary hover:underline">
                    Lupa Password?
                </a>
            @endif
        </div>

        <button type="submit" class="w-full bg-primary hover:bg-blue-600 text-white font-bold py-2.5 rounded-lg transition-colors shadow-md">
            Masuk
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-medium text-primary hover:underline">Daftar disini</a>
        </p>
    </div>
</div>
@endsection
