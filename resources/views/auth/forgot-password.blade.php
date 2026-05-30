@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
    <!-- LEFT -->
        <section class="flex w-full flex-1 flex-col px-6 py-10 lg:w-1/2">
            <!-- Logo (Optional Link to Home) -->
            <div class="mb-10">
                <!-- Warna logo tetap biru di light mode, menjadi lebih lembut (white/biru muda) di dark mode -->
                <a href="{{ url('/') }}" class="text-2xl font-bold text-primary dark:text-white flex items-center gap-2 transition-colors">
                    <img src="{{ asset('logo-siakad.svg') }}" class="w-48" alt="e-SIAKAD">
                </a>
            </div>
            <!-- Form -->
            <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">
                <h2 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">@yield('title')</h2>

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
                        <div class="relative">
                            <x-input
                                name="email"
                                type="email"
                                label="Email"
                                placeholder="Enter your email"
                                size="md"
                                icon="email"
                                value="{{ old('email') }}"
                                required="true" />

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
                    <x-button type="submit" variant="primary" size="sm" class="w-full">
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
            </div>
        </section>
        <!-- RIGHT -->
        <section
            class="
                relative hidden overflow-hidden
                lg:flex lg:w-1/2
                items-center justify-center
                bg-brand-900
            "
        >
            <!-- Decoration -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-white/5"></div>
                <div class="absolute bottom-0 left-0 h-60 w-60 rounded-full bg-white/5"></div>
            </div>
            <!-- Content -->
            <div class="relative z-10 max-w-md text-center">

                <div
                    class="
                        mx-auto mb-8
                        flex h-20 w-20
                        items-center justify-center
                        rounded-3xl
                        bg-white/10
                        backdrop-blur
                    "
                >

                    <span class="material-icons-outlined text-5xl text-white">
                        school
                    </span>

                </div>

                <h1 class="mb-4 text-4xl font-bold text-white">
                    e-SIAKAD
                </h1>

                <p class="text-lg leading-relaxed text-brand-100/80">
                    Sistem Informasi Akademik modern untuk kampus Islam berbasis Laravel dan TailwindCSS.
                </p>

            </div>
        </section>
@endsection
