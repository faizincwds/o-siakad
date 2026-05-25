@extends('layouts.auth')

@section('title', '500 Server Error')

@section('content')
    <!-- BAGIAN KIRI: Konten Error -->
    <div class="flex w-full flex-col items-center justify-center px-5 py-16 lg:w-1/2 lg:px-16 lg:py-0 relative z-10">

        <!-- Logo -->
        <div class="absolute top-6 left-6 lg:top-10 lg:left-10">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-primary dark:text-white flex items-center gap-2 transition-colors">
                <img src="{{ asset('logo-siakad.svg') }}" class="mb-10 w-48" alt="e-SIAKAD">
            </a>
        </div>

        <div class="w-full max-w-md text-center lg:text-left">
            <!-- Ilustrasi Mobile Only -->
            <div class="mb-8 lg:hidden flex justify-center">
                <!-- Mobile Icon: Server Error / Warning -->
                <svg class="w-48 h-48 text-primary dark:text-blue-400 opacity-80 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>

            <!-- Label Error -->
            <h4 class="mb-3 text-sm font-semibold text-primary dark:text-blue-400">500 Server Error</h4>
            <!-- Judul Utama -->
            <h2 class="mb-4 text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">
                Internal Server Error!
            </h2>
            <!-- Deskripsi -->
            <p class="mb-8 text-base text-gray-500 dark:text-gray-400 leading-relaxed">
                Something went wrong on our servers. We are working to fix the problem. Please try again later.
            </p>

            <div class="flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start">
                <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3.5 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-brand-600 hover:text-white dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3 dark:hover:text-gray-200">
                    <svg class="mr-2 h-5 w-5 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </div>

    <!-- BAGIAN KANAN: Ilustrasi / Branding Area -->
    <div class="hidden w-full items-center justify-center bg-brand-800 dark:bg-gray-800 lg:flex lg:w-1/2 relative overflow-hidden transition-colors duration-300">
        <!-- Dekorasi -->
        <div class="absolute -top-20 -right-20 h-96 w-96 rounded-full bg-white opacity-10"></div>
        <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-white opacity-10"></div>

        <!-- Ilustrasi SVG -->
        <div class="relative z-10 w-full max-w-lg px-10 text-center">
            <svg class="mx-auto h-auto w-full text-white/20 opacity-90 drop-shadow-2xl" viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Background Blob -->
                <path d="M200 300C310.457 300 400 232.843 400 150C400 67.1574 310.457 0 200 0C89.543 0 0 67.1574 0 150C0 232.843 89.543 300 200 300Z" fill="white" fill-opacity="0.05"/>

                <!-- 500 Text Big -->
                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="white" fill-opacity="0.1" font-size="180" font-family="sans-serif" font-weight="bold">500</text>

                <!-- Magnifying Glass -->
                <g transform="translate(120, 100)">
                    <circle cx="70" cy="70" r="50" stroke="white" stroke-width="8" fill="rgba(255,255,255,0.1)"/>
                    <path d="M105 105L150 150" stroke="white" stroke-width="12" stroke-linecap="round"/>
                    
                    <!-- ICON: Tanda Seru / Warning -->
                    <path d="M70 50 V75" stroke="white" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                    <circle cx="70" cy="90" r="4" fill="white"/>
                </g>
            </svg>

            <h3 class="mt-8 text-2xl font-bold text-white">System Error</h3>
            <p class="mt-3 text-brand-100 dark:text-white/80">
                Our servers encountered an unexpected error. <br class="hidden xl:block" />
                Our technical team has been notified.
            </p>
        </div>
    </div>

@endsection