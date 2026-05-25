<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Authentication')</title>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body
    x-data="themesAuth()"
    x-cloak
    class="
        min-h-screen
        bg-white
        text-gray-800
        antialiased
        dark:bg-gray-900
        dark:text-gray-100
    "
>

    <div class="relative flex min-h-screen flex-col lg:flex-row">

        <!-- LEFT -->
        <section class="flex w-full flex-1 flex-col px-6 py-10 lg:w-1/2">

            <!-- Form -->
            <div class="mx-auto flex w-full max-w-md flex-1 flex-col justify-center">

                @yield('content')

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

        <!-- Theme Toggle -->
        <div class="fixed right-6 bottom-6 z-50">

            <button
                type="button"
                @click="cycleTheme()"
                class="
                    inline-flex size-14 items-center justify-center
                    rounded-full
                    bg-brand-500
                    text-white
                    shadow-lg shadow-brand-500/20
                    transition-all duration-200
                    hover:bg-brand-600
                    active:scale-95
                "
                :title="'Tema: ' + themeLabel"
            >

                <!-- Moon -->
                <svg
                    x-show="isDark"
                    x-transition.opacity.duration.200ms
                    xmlns="http://www.w3.org/2000/svg"
                    class="absolute h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                >
                    <path
                        d="M21 12.79A9 9 0 1111.21 3
                        7 7 0 0021 12.79z"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>

                <!-- Sun -->
                <svg
                    x-show="!isDark"
                    x-transition.opacity.duration.200ms
                    xmlns="http://www.w3.org/2000/svg"
                    class="absolute h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                >
                    <circle
                        cx="12"
                        cy="12"
                        r="5"
                        stroke="currentColor"
                        stroke-width="2"
                    />

                    <path
                        d="M12 1V3
                        M12 21V23
                        M4.22 4.22L5.64 5.64
                        M18.36 18.36L19.78 19.78
                        M1 12H3
                        M21 12H23
                        M4.22 19.78L5.64 18.36
                        M18.36 5.64L19.78 4.22"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                    />
                </svg>

            </button>

        </div>

    </div>

    @stack('scripts')
</body>
</html>
