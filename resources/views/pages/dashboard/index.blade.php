@extends('layouts.app')

@section('title', 'Dashboard Akademik')

@section('content')
<div class="space-y-5">

    <!-- 1. WELCOME BANNER -->
    <section class="relative overflow-hidden rounded-2xl">
        <!-- Background Blur Effects -->
        <div class="absolute w-52 h-52 rounded-full -top-10 right-[8%] opacity-20 blur-[70px] bg-brand-500"></div>
        <div class="absolute w-36 h-36 rounded-full -bottom-8 left-[3%] opacity-10 blur-[50px] bg-brand-500"></div>

        <div class="relative bg-card border border-card-border rounded-2xl overflow-hidden">
            <div class="flex flex-col lg:flex-row">
                <!-- Ilustrasi Kiri -->
                <div class="lg:w-5/12 min-h-[190px] flex items-center justify-center p-6 bg-brand-500/5">
                    <svg viewBox="0 0 300 200" class="w-full max-w-[260px]" fill="none">
                        <rect x="30" y="15" width="190" height="120" rx="7" fill="#047857" opacity=".85"></rect>
                        <rect x="38" y="23" width="174" height="104" rx="4" fill="#059669"></rect>
                        <line x1="58" y1="45" x2="175" y2="45" stroke="#6ee7b7" stroke-width="1.5" stroke-linecap="round" opacity=".6"></line>
                        <line x1="58" y1="60" x2="160" y2="60" stroke="#a7f3d0" stroke-width="1.5" stroke-linecap="round" opacity=".45"></line>
                        <line x1="58" y1="75" x2="185" y2="75" stroke="#6ee7b7" stroke-width="1.5" stroke-linecap="round" opacity=".6"></line>
                        <line x1="58" y1="90" x2="140" y2="90" stroke="#a7f3d0" stroke-width="1.5" stroke-linecap="round" opacity=".45"></line>
                        <line x1="58" y1="105" x2="170" y2="105" stroke="#6ee7b7" stroke-width="1.5" stroke-linecap="round" opacity=".35"></line>
                        <rect x="140" y="132" width="36" height="10" rx="3" fill="#fbbf24"></rect>
                        <circle cx="80" cy="168" r="14" fill="#065f46"></circle>
                        <circle cx="80" cy="163" r="9" fill="#d1fae5"></circle>
                        <rect x="64" y="172" width="32" height="20" rx="5" fill="#047857"></rect>
                        <line x1="96" y1="178" x2="125" y2="155" stroke="#d1fae5" stroke-width="2.5" stroke-linecap="round"></line>
                        <rect x="155" y="170" width="90" height="5" rx="2.5" fill="#047857" opacity=".5"></rect>
                        <circle cx="178" cy="160" r="7" fill="#a7f3d0"></circle>
                        <rect x="172" y="167" width="12" height="12" rx="3" fill="#059669" opacity=".6"></rect>
                        <circle cx="210" cy="160" r="7" fill="#a7f3d0"></circle>
                        <rect x="204" y="167" width="12" height="12" rx="3" fill="#059669" opacity=".6"></rect>
                        <circle cx="242" cy="160" r="7" fill="#d1fae5"></circle>
                        <rect x="236" y="167" width="12" height="12" rx="3" fill="#047857" opacity=".6"></rect>
                    </svg>
                </div>

                <!-- Teks Kanan -->
                <div class="lg:w-7/12 p-5 lg:p-7 flex flex-col justify-center">
                    <span class="inline-flex items-center gap-1 w-fit px-2.5 py-1 text-[10px] font-semibold rounded-md bg-brand-100 text-brand-700 dark:bg-brand-900/30 dark:text-brand-400 mb-2">
                        <span class="material-icons-outlined" style="font-size:10px">auto_awesome</span> Selamat Datang
                    </span>
                    <h2 class="font-display font-bold text-xl lg:text-[22px] leading-tight text-foreground mb-1.5">
                        Dashboard Akademik<br>Neo Feeder PDDIKTI
                    </h2>
                    <p class="text-[12px] leading-relaxed text-muted mb-3">
                        Kelola data akademik perguruan tinggi terintegrasi dengan standar nasional Kemendikbudristek.
                    </p>
                    <div class="space-y-1.5 text-[11.5px] text-foreground">
                        <div class="flex items-center gap-2">
                            <span class="material-icons-outlined text-brand-500" style="font-size:14px">location_on</span>
                            Jl. Pendidikan No. 45, Jakarta Selatan 12345
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="material-icons-outlined text-brand-500" style="font-size:14px">phone</span>
                            (021) 7890-1234 ext. 205
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="material-icons-outlined text-brand-500" style="font-size:14px">email</span>
                            feeder@unima.ac.id
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. STATISTIK CARDS -->
    <section class="grid grid-cols-2 lg:grid-cols-4 gap-3">
        <!-- Mahasiswa Aktif -->
        <div class="bg-card border border-card-border rounded-lg p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="w-9 h-9 rounded-lg bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center">
                    <span class="material-icons-outlined" style="font-size:18px">school</span>
                </div>
                <span class="inline-flex items-center gap-0.5 px-2 py-0.5 text-[9px] font-semibold rounded-md bg-brand-100 text-brand-700 dark:bg-brand-900/30 dark:text-brand-400">
                    <span class="material-icons-outlined" style="font-size:8px">arrow_upward</span> 12%
                </span>
            </div>
            <div class="text-2xl font-display font-bold text-foreground">2.847</div>
            <div class="text-[10px] font-medium text-muted mt-0.5">Mahasiswa Aktif</div>
        </div>

        <!-- Dosen Pengampu -->
        <div class="bg-card border border-card-border rounded-lg p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="w-9 h-9 rounded-lg bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center">
                    <span class="material-icons-outlined" style="font-size:18px">person</span>
                </div>
                <span class="inline-flex items-center gap-0.5 px-2 py-0.5 text-[9px] font-semibold rounded-md bg-brand-100 text-brand-700 dark:bg-brand-900/30 dark:text-brand-400">
                    <span class="material-icons-outlined" style="font-size:8px">arrow_upward</span> 5%
                </span>
            </div>
            <div class="text-2xl font-display font-bold text-foreground">186</div>
            <div class="text-[10px] font-medium text-muted mt-0.5">Dosen Pengampu</div>
        </div>

        <!-- Mata Kuliah -->
        <div class="bg-card border border-card-border rounded-lg p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="w-9 h-9 rounded-lg bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center">
                    <span class="material-icons-outlined" style="font-size:18px">menu_book</span>
                </div>
                <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400">Stabil</span>
            </div>
            <div class="text-2xl font-display font-bold text-foreground">342</div>
            <div class="text-[10px] font-medium text-muted mt-0.5">Mata Kuliah</div>
        </div>

        <!-- Program Studi -->
        <div class="bg-card border border-card-border rounded-lg p-4">
            <div class="flex items-center justify-between mb-2">
                <div class="w-9 h-9 rounded-lg bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center">
                    <span class="material-icons-outlined" style="font-size:18px">apartment</span>
                </div>
                <span class="inline-flex items-center gap-0.5 px-2 py-0.5 text-[9px] font-semibold rounded-md bg-brand-100 text-brand-700 dark:bg-brand-900/30 dark:text-brand-400">
                    <span class="material-icons-outlined" style="font-size:8px">arrow_upward</span> 3%
                </span>
            </div>
            <div class="text-2xl font-display font-bold text-foreground">8</div>
            <div class="text-[10px] font-medium text-muted mt-0.5">Program Studi</div>
        </div>
    </section>

    <!-- 3. LOG SYNC & PERKULIAHAN -->
    <section class="grid grid-cols-1 xl:grid-cols-5 gap-3.5">

        <!-- Log Sinkronisasi -->
        <div class="xl:col-span-3 bg-card border border-card-border rounded-lg p-4">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-brand-500 animate-pulse"></div>
                    <h3 class="font-display font-bold text-[13px] text-foreground">Log Sinkronisasi</h3>
                </div>
                <x-button variant="primary" size="sm" icon="sync" class="!px-3 !py-1.5 !text-[11px]">
                    Sync
                </x-button>
            </div>

            <div class="space-y-1 max-h-[240px] overflow-y-auto pr-1">
                <!-- Item Log -->
                <div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-6 h-6 rounded-md bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:13px">check</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground">Full Sync</div>
                        <div class="text-[9.5px] text-muted">Baru saja · 2395 record</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-brand-100 text-brand-700 dark:bg-brand-900/30 dark:text-brand-400 shrink-0">Berhasil</span>
                </div>

                <div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-6 h-6 rounded-md bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:13px">check</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground">Mahasiswa</div>
                        <div class="text-[9.5px] text-muted">Hari ini, 07:45 · 342 record</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-brand-100 text-brand-700 dark:bg-brand-900/30 dark:text-brand-400 shrink-0">Berhasil</span>
                </div>

                <div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-6 h-6 rounded-md bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:13px">check</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground">Dosen</div>
                        <div class="text-[9.5px] text-muted">Hari ini, 07:42 · 186 record</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-brand-100 text-brand-700 dark:bg-brand-900/30 dark:text-brand-400 shrink-0">Berhasil</span>
                </div>

                <div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-6 h-6 rounded-md bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:13px">check</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground">Nilai</div>
                        <div class="text-[9.5px] text-muted">Kemarin, 16:30 · 1847 record</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-brand-100 text-brand-700 dark:bg-brand-900/30 dark:text-brand-400 shrink-0">Berhasil</span>
                </div>

                <!-- Contoh Gagal -->
                <div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-6 h-6 rounded-md bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:13px">close</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground">Kelas Kuliah</div>
                        <div class="text-[9.5px] text-muted">Kemarin, 16:28 · 520 record</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 shrink-0">Gagal</span>
                </div>

                <div class="flex items-center gap-2 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-6 h-6 rounded-md bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:13px">check</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground">Kurikulum</div>
                        <div class="text-[9.5px] text-muted">28 Apr, 09:15 · 8 record</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-brand-100 text-brand-700 dark:bg-brand-900/30 dark:text-brand-400 shrink-0">Berhasil</span>
                </div>
            </div>
        </div>

        <!-- Perkuliahan Hari Ini -->
        <div class="xl:col-span-2 bg-card border border-card-border rounded-lg p-4">
            <h3 class="font-display font-bold text-[13px] text-foreground mb-3">Perkuliahan Hari Ini</h3>
            <div class="space-y-1">
                <div class="flex items-center gap-2.5 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-7 h-7 rounded-lg bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:14px">event</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground truncate">Algoritma dan Pemrograman</div>
                        <div class="text-[9.5px] text-muted">Senin, 08:00-11:30 · Lab A1</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400 shrink-0">42 mhs</span>
                </div>

                <div class="flex items-center gap-2.5 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-7 h-7 rounded-lg bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:14px">event</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground truncate">Basis Data</div>
                        <div class="text-[9.5px] text-muted">Selasa, 08:00-11:30 · Lab A2</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400 shrink-0">38 mhs</span>
                </div>

                <div class="flex items-center gap-2.5 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-7 h-7 rounded-lg bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:14px">event</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground truncate">Struktur Data</div>
                        <div class="text-[9.5px] text-muted">Rabu, 08:00-10:30 · Lab A1</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400 shrink-0">40 mhs</span>
                </div>

                <div class="flex items-center gap-2.5 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-7 h-7 rounded-lg bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:14px">event</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground truncate">Analisis Sistem</div>
                        <div class="text-[9.5px] text-muted">Kamis, 08:00-10:30 · Lab B1</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400 shrink-0">35 mhs</span>
                </div>

                <div class="flex items-center gap-2.5 p-1.5 rounded-lg hover:bg-surface cursor-pointer transition-colors">
                    <div class="w-7 h-7 rounded-lg bg-brand-100 dark:bg-brand-900/30 text-brand-600 dark:text-brand-400 flex items-center justify-center shrink-0">
                        <span class="material-icons-outlined" style="font-size:14px">event</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-[10.5px] font-semibold text-foreground truncate">SPK</div>
                        <div class="text-[9.5px] text-muted">Jumat, 08:00-10:30 · Lab B1</div>
                    </div>
                    <span class="px-2 py-0.5 text-[9px] font-semibold rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400 shrink-0">30 mhs</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. DISTRIBUSI MAHASISWA & STATUS PENILAIAN -->
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-3.5">

        <!-- Distribusi Mahasiswa -->
        <div class="bg-card border border-card-border rounded-lg p-4">
            <h3 class="font-display font-bold text-[13px] text-foreground mb-3">Distribusi Mahasiswa per Prodi</h3>
            <div class="space-y-2.5">
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-[10.5px] font-semibold text-foreground">Teknik Informatika</span>
                        <span class="text-[9.5px] font-mono text-muted">620</span>
                    </div>
                    <div class="h-2 bg-surface rounded-full overflow-hidden">
                        <div class="h-full bg-brand-500 rounded-full" style="width: 86%; opacity: 0.86;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-[10.5px] font-semibold text-foreground">Sistem Informasi</span>
                        <span class="text-[9.5px] font-mono text-muted">510</span>
                    </div>
                    <div class="h-2 bg-surface rounded-full overflow-hidden">
                        <div class="h-full bg-brand-500 rounded-full" style="width: 71%; opacity: 0.71;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-[10.5px] font-semibold text-foreground">Manajemen</span>
                        <span class="text-[9.5px] font-mono text-muted">720</span>
                    </div>
                    <div class="h-2 bg-surface rounded-full overflow-hidden">
                        <div class="h-full bg-brand-500 rounded-full" style="width: 100%; opacity: 1;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-[10.5px] font-semibold text-foreground">Akuntansi</span>
                        <span class="text-[9.5px] font-mono text-muted">480</span>
                    </div>
                    <div class="h-2 bg-surface rounded-full overflow-hidden">
                        <div class="h-full bg-brand-500 rounded-full" style="width: 67%; opacity: 0.67;"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-[10.5px] font-semibold text-foreground">Ilmu Komunikasi</span>
                        <span class="text-[9.5px] font-mono text-muted">517</span>
                    </div>
                    <div class="h-2 bg-surface rounded-full overflow-hidden">
                        <div class="h-full bg-brand-500 rounded-full" style="width: 72%; opacity: 0.72;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Penilaian -->
        <div class="bg-card border border-card-border rounded-lg p-4">
            <h3 class="font-display font-bold text-[13px] text-foreground mb-3">Status Penilaian</h3>

            <div class="grid grid-cols-3 gap-2 mb-3">
                <div class="text-center p-2.5 rounded-xl bg-surface">
                    <div class="font-display font-bold text-lg text-foreground">6</div>
                    <span class="inline-block mt-1 px-2 py-0.5 text-[9px] font-semibold rounded-md bg-brand-100 text-brand-700 dark:bg-brand-900/30 dark:text-brand-400">Selesai</span>
                </div>
                <div class="text-center p-2.5 rounded-xl bg-surface">
                    <div class="font-display font-bold text-lg text-foreground">3</div>
                    <span class="inline-block mt-1 px-2 py-0.5 text-[9px] font-semibold rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400">Proses</span>
                </div>
                <div class="text-center p-2.5 rounded-xl bg-surface">
                    <div class="font-display font-bold text-lg text-foreground">1</div>
                    <span class="inline-block mt-1 px-2 py-0.5 text-[9px] font-semibold rounded-md bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400">Belum</span>
                </div>
            </div>

            <div class="h-2 bg-surface rounded-full overflow-hidden mb-1.5">
                <div class="h-full bg-brand-500 rounded-full" style="width: 60%;"></div>
            </div>
            <div class="flex justify-between text-[9.5px] text-muted">
                <span>Progress Input Nilai</span>
                <span class="font-semibold text-foreground">60%</span>
            </div>
        </div>

    </section>

</div>
@endsection
