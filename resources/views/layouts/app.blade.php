<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> {{ $meta['title'] ?? config('app.name') }} </title>
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
  </head>

  <body
    x-data="themesUI()"
    class="font-body bg-surface text-foreground antialiased overflow-x-hidden transition-colors duration-300"
    x-effect="document.documentElement.classList.toggle('dark', isDark)"
    @keydown.escape="mobileSidebar = false; userDropdown = false"
    @resize.window="windowWidth = window.innerWidth; if (windowWidth > 1024) mobileSidebar = false">

  <div
    x-show="mobileSidebar"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @click="mobileSidebar = false"
    class="fixed inset-0 z-40 bg-black/30 backdrop-blur-sm lg:hidden">
  </div>

  <div
    class="min-h-screen flex flex-col transition-[margin] duration-300 ease-in-out"
    :style="`margin-left: ${sidebarOffset}px`">

        @include('layouts.partials.header')
        @include('layouts.partials.sidebar')

        <main class="flex-1 p-4 md:p-5">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-1 text-[11px] text-muted mb-4 flex-wrap" aria-label="Breadcrumb">
            <template x-for="(crumb, i) in breadcrumbs" :key="i">
            <span class="contents">
                <span :class="{ 'text-foreground font-semibold': i === breadcrumbs.length - 1 }" x-text="crumb"></span>
                <span x-show="i < breadcrumbs.length - 1" class="material-icons-outlined text-[11px]">chevron_right</span>
            </span>
            </template>
        </nav>

        <!-- Page Title -->
        <div class="flex items-start gap-3 mb-6" x-show="pageTitle">
            <div class="w-9 h-9 rounded-xl bg-brand-500/10 flex items-center justify-center shrink-0">
            <span class="material-icons-outlined text-[19px] text-brand-500" x-text="pageIcon"></span>
            </div>
            <div>
            <h1 class="font-display font-bold text-[17px] leading-tight text-foreground" x-text="pageTitle"></h1>
            <p class="text-[11px] text-muted mt-0.5" x-text="pageDesc"></p>
            </div>
        </div>

        <!-- Empty Content Area -->
        <div class="bg-card border border-card-border rounded-xl p-8 text-center transition-colors duration-300">
            <div class="w-16 h-16 rounded-2xl bg-surface mx-auto mb-4 flex items-center justify-center">
            <span class="material-icons-outlined text-[32px] text-muted/40" x-text="pageIcon || 'widgets'"></span>
            </div>
            <h3 class="font-display font-bold text-sm text-foreground mb-1" x-text="pageTitle || 'Dashboard'"></h3>
            <p class="text-[11px] text-muted max-w-xs mx-auto">Konten halaman akan ditampilkan di sini. Pilih menu di sidebar untuk bernavigasi.</p>

                @yield('content')

        </div>
        </main>

        <footer class="px-5 py-2.5 text-center border-t border-border shrink-0">
            <p class="text-[9px] text-muted">Neo Feeder v3.0.0 — e-SIAKAD &copy; 2026</p>
        </footer>

        @include('layouts.partials.footer')

  </div>
@stack('scripts')
<script>
    window.appConfig = {
        activePage:
            @json(Route::currentRouteName()),
        menuItems:
            @json($menuItems),
        pageMeta:
            @json($pageMeta),
        themeOpts:
            @json($themeOpts),
        // routes: {
        //     @foreach($pageMeta as $key => $meta)
        //         '{{ $key }}':
        //             '{{ Route::has($key) ? route($key) : '#' }}',
        //     @endforeach }
        routes: @json(
            collect($menuItems)
                ->flatMap(function ($item) {
                    if (isset($item['children'])) {
                        return collect($item['children'])
                            ->pluck('route');
                    }

                    return [$item['route'] ?? null];
                })
                ->filter()
                ->mapWithKeys(fn ($route) => [
                    $route => route($route)
                ])
        ),

    }
</script>
</body>
</html>
