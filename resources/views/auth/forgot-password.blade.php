@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
    <img src="{{ asset('logo-siakad.svg') }}" class="mb-10" alt="e-SIAKAD">

    <h2 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">
        Forgot Password?
    </h2>

    <p class="mb-9 text-sm text-gray-500 dark:text-gray-400">
        No worries, we'll send you reset instructions.
    </p>

    <!-- Success Message (Muncul jika Laravel berhasil mengirim email) -->
    @if (session('status'))
        <div class="mb-5 flex items-center gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-600 dark:border-green-700 dark:bg-green-900/20 dark:text-green-400">
            <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ session('status') }}
        </div>
    @endif

    <form
        method="POST"
        action="{{ Route::has('password.email') ? route('password.email') : '#' }}"
        class="space-y-5"
    >
        @csrf

        <!-- Email -->
        <div>
            <label class="mb-2.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Email <span class="text-red-500">*</span>
            </label>

            <div class="relative">
                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 pl-5 pr-12 text-gray-900 outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-gray-700 dark:bg-gray-800/50 dark:text-white"
                    required
                >

                <span class="absolute right-4 top-3.5 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                        />
                    </svg>
                </span>
            </div>

            @error('email')
                <p class="mt-1.5 flex items-center gap-1.5 text-xs text-red-500">
                    <svg class="h-3.5 w-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Submit Button -->
        <x-button type="submit" variant="primary" size="md" class="w-full">
            <span class="material-icons-outlined text-[20px]">lock_reset</span>
            <span>Reset Password</span>
        </x-button>
    </form>

    <!-- Back to Login Link -->
    <div class="mt-8 text-center">
        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
            Remember your password?
            <a
                href="{{ Route::has('login') ? route('login') : '#' }}"
                class="text-primary hover:underline"
            >
                Back to Login
            </a>
        </p>
    </div>
@endsection