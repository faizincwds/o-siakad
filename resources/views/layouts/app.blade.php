<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Neo Feeder — Dashboard Akademik PDDIKTI">
    <meta name="theme-color" content="#4f46e5">
    <title>Neo Feeder — @yield('title', 'Dashboard Akademik')</title>

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['"Space Grotesk"', 'sans-serif'],
                        body: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Material Icons Outlined --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="antialiased">
    {{-- Overlay --}}
    <div class="ov" id="ov" onclick="cmob()"></div>

    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Main Wrapper --}}
    <div class="mw" id="mw">
        {{-- Header --}}
        @include('partials.header')

        {{-- Main Content --}}
        <main class="p-4 md:p-5 flex-1" id="pg">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="p-4 text-center text-sm" style="color:var(--tx2);border-top:1px solid var(--bd)">
            Neo Feeder v3.0.0 — Universitas Nusantara Mandiri &copy; 2026
        </footer>
    </div>

    {{-- Modal --}}
    <div class="mb" id="mdl" onclick="if(event.target===this)cmod()">
        <div class="mx" id="mxB"></div>
    </div>

    {{-- Toast Container --}}
    <div class="tc" id="tc"></div>

    @stack('scripts')
</body>
</html>
