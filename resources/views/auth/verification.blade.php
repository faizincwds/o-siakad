@extends('layouts.auth')

@section('title', 'Verification Successful')

@section('content')
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
@endsection