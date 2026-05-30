@extends('layouts.auth')

@section('title', 'Create Account')

@section('content')
    <!-- LEFT -->
    <section class="flex w-full flex-1 flex-col px-6 py-10 lg:w-1/2">
        <!-- Logo -->
        <div class="mb-10">
            <a href="{{ url('/') }}" class="inline-block">
                <img src="{{ asset('logo-siakad.svg') }}" class="w-48" alt="e-SIAKAD">
            </a>
        </div>

        <!-- Form -->
        <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">
            <h2 class="mb-2 text-2xl font-bold text-foreground">@yield('title')</h2>
            <p class="mb-8 text-md text-muted">Enter your details below to create your account!</p>

            <form method="POST" action="{{ Route::has('register') ? route('register') : '#' }}" class="space-y-5">
                @csrf

                <!-- Menggunakan x-input component -->
                <x-input name="name" type="text" label="Full Name" placeholder="Enter your full name" size="md" icon="user" value="{{ old('name') }}" required />

                <!-- Menggunakan x-input component -->
                <x-input name="email" type="email" label="Email" placeholder="Enter your email" size="md" icon="email" value="{{ old('email') }}" required />

                <x-forms.password-field />

                <!-- Terms -->
                <x-forms.terms-agreement
                    :terms-url="Route::has('terms') ? route('terms') : '#'"
                    :privacy-url="Route::has('privacy') ? route('privacy') : '#'"
                />

                <!-- Menggunakan x-button component -->
                <x-button type="submit" variant="primary" size="sm" class="w-full" icon="person_add">
                    Create Account
                </x-button>
            </form>

            <!-- Login Link -->
            <div class="mt-8 text-center">
                <p class="text-sm font-medium text-foreground">
                    Already have an account?
                    <a href="{{ Route::has('login') ? route('login') : '#' }}" class="text-brand-600 hover:underline dark:text-brand-400">Sign In</a>
                </p>
            </div>
        </div>
    </section>

    <!-- RIGHT -->
    <section class="relative hidden overflow-hidden lg:flex lg:w-1/2 items-center justify-center bg-brand-900">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-white/5"></div>
            <div class="absolute bottom-0 left-0 h-60 w-60 rounded-full bg-white/5"></div>
        </div>
        <div class="relative z-10 max-w-md text-center">
            <div class="mx-auto mb-8 flex h-20 w-20 items-center justify-center rounded-3xl bg-white/10 backdrop-blur">
                <span class="material-icons-outlined text-5xl text-white">school</span>
            </div>
            <h1 class="mb-4 text-4xl font-bold text-white">e-SIAKAD</h1>
            <p class="text-lg leading-relaxed text-brand-100/80">Sistem Informasi Akademik modern untuk kampus Islam berbasis Laravel dan TailwindCSS.</p>
        </div>
    </section>
@endsection
