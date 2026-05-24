@extends('layouts.auth')

@section('title', 'Sign In')

@section('content')

    <img src="{{ asset('logo-siakad.svg') }}" class="mb-10" alt="e-SIAKAD">
    <h2 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">@yield('title')</h2>
    <p class="mb-9 text-sm text-gray-500 dark:text-gray-400">
        Enter your email and password to sign in!
    </p>

    <form method="POST" action="{{ route('login') ? route('login') : '#' }}" class="space-y-5">
        @csrf
        <!-- Email -->
        <div>
            <label class="mb-2.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Email <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input type="email" name="email" placeholder="Enter your email"
                    class="w-full rounded-lg border border-stroke bg-transparent py-3 pl-5 pr-12 text-gray-900 outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-strokedark dark:bg-gray-800/50 dark:text-white dark:focus:border-primary"
                    value="{{ old('email') }}">
                <span class="absolute right-4 top-3.5 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                </span>
            </div>
            @error('email')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label class="mb-2.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Password <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input type="password" name="password" placeholder="Enter your password"
                    class="w-full rounded-lg border border-stroke bg-transparent py-3 pl-5 pr-12 text-gray-900 outline-none focus:border-primary focus:ring-1 focus:ring-primary dark:border-strokedark dark:bg-gray-800/50 dark:text-white dark:focus:border-primary">
                <span class="absolute right-4 top-3.5 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                        </path>
                    </svg>
                </span>
            </div>
            @error('password')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember & Forgot -->
        <div class="flex items-center justify-between">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" name="remember"
                    class="form-checkbox h-5 w-5 rounded border-gray-300 text-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-800">
                <span class="ml-2.5 text-sm font-medium text-gray-700 dark:text-gray-300">Keep me logged in</span>
            </label>

            @if (Route::has('password.request') ? route('password.request') : false)
                <a href="{{ Route::has('password.request') ? route('password.request') : '#' }}" class="text-sm font-medium text-primary hover:underline">
                    Forgot password?
                </a>
            @endif
        </div>

        <!-- Button -->
        <x-button type="submit" variant="primary" size="md" class="w-full">
            <span class="material-icons-outlined text-[20px]"> login</span>
            <span> Sign In </span>
        </x-button>

    </form>

    <!-- Register Link -->
    <div class="mt-8 text-center">
        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
            Don’t have an account?
            <a href="{{ route('register') ? route('register') : '#' }}" class="text-primary hover:underline">Sign Up</a>
        </p>
    </div>

@endsection
