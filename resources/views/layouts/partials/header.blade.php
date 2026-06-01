<header
    class="sticky top-0 z-30 h-17 flex items-center justify-between px-4 md:px-5
    bg-white/88 dark:bg-slate-900/90 backdrop-blur-xl backdrop-saturate-[1.8]
    border-b border-card-border transition-colors duration-300">

    <!-- LEFT -->
    <div class="flex items-center gap-2.5">

        <button
            @click="toggleSidebar()"
            class="w-8 h-8 rounded-lg bg-surface cursor-pointer hover:bg-border
            flex items-center justify-center transition-colors">

            <span class="material-icons-outlined text-[18px] text-muted">
                menu
            </span>
        </button>

        <div class="hidden sm:block">

            <div class="font-display font-bold text-sm text-foreground">
                STITUSA BANJARNEGARA
            </div>

            <div class="flex items-center gap-1 text-xs font-medium text-muted">

                <span class="material-icons-outlined icon-sm">
                    calendar_month
                </span>

                Semester Genap 2025/2026

                <span
                    class="ml-1.5 inline-flex items-center gap-1
                    text-brand-600 bg-brand-50
                    px-1.5 py-0.5 rounded-full
                    text-[9px] font-bold">

                    <span
                        class="w-1.5 h-1.5 rounded-full
                        bg-brand-500 animate-pulse">
                    </span>

                    AKTIF

                </span>

            </div>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="flex items-center gap-1.5">

        <!-- SEARCH -->
        <div
            class="hidden md:flex items-center
            bg-surface rounded-lg px-2.5 py-1.5 gap-1.5
            border border-transparent
            focus-within:border-brand-500
            focus-within:bg-card
            focus-within:shadow-[0_0_0_3px_rgba(16,185,129,.08)]
            transition-all duration-200 w-52">

            <span class="material-icons-outlined text-[17px] text-muted">
                search
            </span>

            <input
                type="text"
                placeholder="Cari menu..."
                x-model="searchQuery"
                @keydown.enter="doSearch()"
                class="w-full bg-transparent border-none outline-none
                text-[12.5px] text-foreground
                placeholder:text-muted">

        </div>

        <!-- NOTIFICATION -->
        <div
            class="relative"
            x-data="{ notificationOpen:false }"
            @click.outside="notificationOpen=false">

            <button
                @click="notificationOpen=!notificationOpen"
                class="relative w-8 h-8 rounded-lg bg-surface hover:bg-border
                flex items-center justify-center transition-colors">

                <span class="material-icons-outlined text-[18px] text-muted">
                    notifications_none
                </span>

                <span
                    class="absolute -top-0.5 -right-0.5
                    min-w-[14px] h-[14px]
                    px-1 rounded-full
                    bg-red-500 text-white
                    text-[8px] font-bold
                    flex items-center justify-center
                    ring-2 ring-card">

                    3

                </span>

            </button>

            <!-- DROPDOWN NOTIFICATION -->
            <div
                x-show="notificationOpen"
                x-transition
                class="absolute right-0 mt-2
                w-90 max-w-[95vw]
                bg-card border border-card-border
                rounded-xl shadow-xl
                overflow-hidden z-50">

                <!-- HEADER -->
                <div
                    class="flex items-center justify-between
                    px-4 py-3 border-b border-card-border">

                    <div>

                        <h3 class="font-semibold text-sm text-foreground">
                            Notifikasi
                        </h3>

                        <p class="text-xs text-muted">
                            3 notifikasi belum dibaca
                        </p>

                    </div>

                    <button
                        class="text-xs text-brand-600 hover:underline">

                        Tandai semua dibaca

                    </button>

                </div>

                <!-- LIST -->
                <div class="max-h-96 overflow-y-auto">

                    <!-- ITEM -->
                    <button
                        class="w-full text-left px-4 py-3
                        hover:bg-surface transition-colors">

                        <div class="flex gap-3">

                            <div
                                class="w-9 h-9 rounded-lg
                                bg-blue-100 dark:bg-blue-500/10
                                flex items-center justify-center">

                                <span class="material-icons-outlined text-blue-600">
                                    school
                                </span>

                            </div>

                            <div class="flex-1">

                                <div class="text-sm font-medium text-foreground">
                                    KRS Semester Genap Dibuka
                                </div>

                                <div class="text-xs text-muted mt-0.5">
                                    Mahasiswa sudah dapat melakukan pengisian KRS.
                                </div>

                                <div class="text-[11px] text-muted mt-1">
                                    5 menit yang lalu
                                </div>

                            </div>

                        </div>

                    </button>

                    <button
                        class="w-full text-left px-4 py-3
                        hover:bg-surface transition-colors">

                        <div class="flex gap-3">

                            <div
                                class="w-9 h-9 rounded-lg
                                bg-amber-100 dark:bg-amber-500/10
                                flex items-center justify-center">

                                <span class="material-icons-outlined text-amber-600">
                                    payments
                                </span>

                            </div>

                            <div class="flex-1">

                                <div class="text-sm font-medium text-foreground">
                                    Pembayaran UKT
                                </div>

                                <div class="text-xs text-muted mt-0.5">
                                    12 mahasiswa belum melakukan pembayaran.
                                </div>

                                <div class="text-[11px] text-muted mt-1">
                                    1 jam yang lalu
                                </div>

                            </div>

                        </div>

                    </button>

                    <button
                        class="w-full text-left px-4 py-3
                        hover:bg-surface transition-colors">

                        <div class="flex gap-3">

                            <div
                                class="w-9 h-9 rounded-lg
                                bg-green-100 dark:bg-green-500/10
                                flex items-center justify-center">

                                <span class="material-icons-outlined text-green-600">
                                    sync
                                </span>

                            </div>

                            <div class="flex-1">

                                <div class="text-sm font-medium text-foreground">
                                    Sinkronisasi Neo Feeder
                                </div>

                                <div class="text-xs text-muted mt-0.5">
                                    Sinkronisasi berhasil dilakukan.
                                </div>

                                <div class="text-[11px] text-muted mt-1">
                                    Kemarin
                                </div>

                            </div>

                        </div>

                    </button>

                </div>

                <!-- FOOTER -->
                <div
                    class="border-t border-card-border
                    px-4 py-3">

                    <button
                        class="w-full text-center
                        text-sm text-brand-600
                        font-medium hover:underline">

                        Lihat Semua Notifikasi

                    </button>

                </div>

            </div>

        </div>

        <!-- THEME -->
        <button
            @click="cycleTheme()"
            class="w-8 h-8 rounded-lg bg-surface hover:bg-border
            flex items-center justify-center transition-colors">

            <span
                class="material-icons-outlined text-[18px] text-muted"
                x-text="themeIcon">
            </span>

        </button>

        <!-- USER -->
        <div
            class="relative z-50"
            @click.outside="userDropdown = false">

            <button
                @click="userDropdown = !userDropdown"
                class="flex items-center gap-1 py-1 px-1.5
                rounded-lg hover:bg-surface transition-colors">

                <img
                    src="https://picsum.photos/seed/neo-usr/40/40.jpg"
                    class="w-8 h-8 rounded-full object-cover">

                <div class="hidden md:block text-left">

                    <div class="text-xs font-semibold text-foreground">
                        Administrator
                    </div>

                    <div class="text-[10px] text-muted">
                        Super Admin
                    </div>

                </div>

                <span class="material-icons-outlined text-[14px] text-muted">
                    expand_more
                </span>

            </button>

            <!-- dropdown tetap -->
            <div
              x-show="userDropdown"
              x-cloak
              x-transition
              class="absolute right-0 top-full mt-2
                     w-42 bg-card
                     border border-card-border
                     rounded-xl shadow-xl
                     overflow-hidden
                     z-[9999]">
          
              <div class="p-4 border-b border-card-border">
                  <div class="font-semibold text-sm text-foreground">
                      Administrator
                  </div>
                  <div class="text-xs text-muted">
                      admin@stitusa.ac.id
                  </div>
              </div>
          
              <div class="p-2">
                  <a href="#"
                     class="flex text-sm items-center gap-2 px-1 py-2 rounded-lg hover:bg-brand-500">
                      <span class="material-icons-outlined">person</span>
                      Profil Saya
                  </a>
          
                  <a href="#"
                     class="flex text-sm items-center gap-2 px-1 py-2 rounded-lg hover:bg-surface">
                      <span class="material-icons-outlined">settings</span>
                      Pengaturan
                  </a>
          
                  <a href="#"
                     class="flex text-sm items-center gap-2 px-1 py-2 rounded-lg hover:bg-surface">
                      <span class="material-icons-outlined">lock</span>
                      Ubah Password
                  </a>
          
                  <hr class="my-2 border-card-border">
                  <button
                      class="w-full text-sm flex items-center gap-2 px-1 py-2 rounded-lg
                             text-red-500 hover:bg-red-50 dark:hover:bg-red-500/10">
                      <span class="material-icons-outlined">
                          logout
                      </span>
                      Keluar
                  </button>
              </div>
          </div>
            
        </div>

    </div>

</header>