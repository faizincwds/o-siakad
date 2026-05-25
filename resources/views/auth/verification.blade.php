@extends('layouts.auth')

@section('title', 'Verification Successful')

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
                <div class="flex flex-col items-center text-center">

                    <!-- Success Icon -->
                    <div class="mb-6 flex h-24 w-24 items-center justify-center rounded-full bg-green-100 dark:bg-green-900/30">
                        <svg class="h-12 w-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <!-- Heading -->
                    <h2 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">
                        Verification Successful!
                    </h2>

                    <!-- Description -->
                    <p class="mb-9 max-w-sm text-sm text-gray-500 dark:text-gray-400">
                        Your email has been successfully verified. You can now log in and access all features of the system.
                    </p>

                    <!-- Go to Login Button -->
                    <a href="{{ Route::has('login') ? route('login') : '#' }}">
                    <x-button type="button" variant="primary" size="sm" class="w-full">
                        <span class="material-icons-outlined text-[20px]">login</span>
                        <span>Go to Login</span>
                    </x-button>
                    </a>

                    <!-- Optional: Go to Home -->
                    <a
                        href="{{ url('/') }}"
                        class="mt-4 text-sm font-medium text-gray-500 transition-colors hover:text-primary dark:text-gray-400 dark:hover:text-primary"
                    >
                        ← Back to Home
                    </a>

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
