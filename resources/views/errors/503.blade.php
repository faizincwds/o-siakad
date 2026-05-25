@extends('layouts.auth')

@section('title', 'Under Maintenance')

@section('content')
    <!-- BAGIAN KIRI: Konten Maintenance -->
    <div class="flex w-full flex-col items-center justify-center px-5 py-16 lg:w-1/2 lg:px-16 lg:py-0 relative z-10">

        <!-- Logo -->
        <div class="absolute top-6 left-6 lg:top-10 lg:left-10">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-primary dark:text-white flex items-center gap-2 transition-colors">
                <img src="{{ asset('logo-siakad.svg') }}" class="mb-10 w-48" alt="e-SIAKAD">
            </a>
        </div>

        <div class="w-full max-w-md text-center lg:text-left">
            
            <!-- Ilustrasi Mobile Only (Roda Gigi) -->
            <div class="mb-8 lg:hidden flex justify-center">
                <svg class="w-48 h-48 text-primary dark:text-blue-400 opacity-80 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>

            <!-- Label Error -->
            <h4 class="mb-3 text-sm font-semibold text-primary dark:text-blue-400">Under Maintenance</h4>
            
            <!-- Judul Utama -->
            <h2 class="mb-4 text-3xl font-bold text-gray-900 dark:text-white sm:text-4xl">
                We'll be back soon!
            </h2>
            
            <!-- Deskripsi -->
            <p class="mb-8 text-base text-gray-500 dark:text-gray-400 leading-relaxed">
                Sorry for the inconvenience. We're performing some essential maintenance. We'll be back online shortly.
            </p>

            <div class="flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start">
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-3.5 text-sm font-medium text-gray-700 shadow-theme-xs hover:bg-brand-600 hover:text-white dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/3 dark:hover:text-gray-200">
                    <svg class="mr-2 h-5 w-5 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Refresh Page
                </a>
            </div>
        </div>
    </div>

    <!-- BAGIAN KANAN: Ilustrasi / Branding Area -->
    <div class="hidden w-full items-center justify-center bg-brand-800 dark:bg-gray-800 lg:flex lg:w-1/2 relative overflow-hidden transition-colors duration-300">
        
        <!-- Dekorasi Background Lingkaran -->
        <div class="absolute -top-20 -right-20 h-96 w-96 rounded-full bg-white opacity-10"></div>
        <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-white opacity-10"></div>

        <!-- Ilustrasi SVG Besar -->
        <div class="relative z-10 w-full max-w-lg px-10 text-center">
            <svg class="mx-auto h-auto w-full text-white/20 opacity-90 drop-shadow-2xl" viewBox="0 0 400 300" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- Background Blob -->
                <path d="M200 300C310.457 300 400 232.843 400 150C400 67.1574 310.457 0 200 0C89.543 0 0 67.1574 0 150C0 232.843 89.543 300 200 300Z" fill="white" fill-opacity="0.05"/>

                <!-- 503 Text Big -->
                <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="white" fill-opacity="0.1" font-size="180" font-family="sans-serif" font-weight="bold">503</text>

                <!-- Magnifying Glass -->
                <g transform="translate(120, 100)">
                    <circle cx="70" cy="70" r="50" stroke="white" stroke-width="8" fill="rgba(255,255,255,0.1)"/>
                    <path d="M105 105L150 150" stroke="white" stroke-width="12" stroke-linecap="round"/>
                    
                    <!-- ICON: Roda Gigi (Gear) -->
                    <g transform="translate(70, 70)">
                        <circle cx="0" cy="0" r="12" stroke="white" stroke-width="6" fill="none"/>
                        <path d="M0 -22 V-16 M0 16 V22 M-22 0 H-16 M16 0 H22" stroke="white" stroke-width="6" stroke-linecap="round"/>
                        <path d="M-15 -15 L-11 -11 M15 15 L11 11 M15 -15 L11 -11 M-15 15 L-11 11" stroke="white" stroke-width="5" stroke-linecap="round"/>
                    </g>
                </g>
            </svg>

            <h3 class="mt-8 text-2xl font-bold text-white">Maintenance Mode</h3>
            <p class="mt-3 text-brand-100 dark:text-white/80">
                We are currently upgrading our system to <br class="hidden xl:block" />
                serve you better. Please check back in a few minutes.
            </p>
        </div>
    </div>

@endsection