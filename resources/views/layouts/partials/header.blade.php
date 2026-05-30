
    <header class="sticky top-0 z-30 h-17 flex items-center justify-between px-4 md:px-5
                   bg-white/88 dark:bg-slate-900/90 backdrop-blur-xl backdrop-saturate-[1.8]
                   border-b border-card-border transition-colors duration-300">
      <!-- Left -->
      <div class="flex items-center gap-2.5">
        <button @click="toggleSidebar()" class="w-8 h-8 rounded-lg bg-surface cursor-pointer hover:bg-border flex items-center justify-center transition-colors" aria-label="Menu">
          <span class="material-icons-outlined text-[18px] text-muted">menu</span>
        </button>
        <div class="hidden sm:block">
          <div class="font-display font-bold text-sm leading-tight text-foreground">STITUSA BANJARNEGARA</div>
          <div class="flex items-center gap-1 text-xs font-medium text-muted">
            <span class="material-icons-outlined icon-sm text-muted"> calendar_month</span>
                Semester Genap 2025/2026
            <span class="ml-1.5 inline-flex items-center gap-1 text-brand-600 bg-brand-50 px-1.5 py-0.5 rounded-full text-[9px] font-bold">
            <span class="w-1.5 h-1.5 rounded-full bg-brand-500 animate-pulse"></span>AKTIF</span></div>
        </div>
      </div>

      <!-- Right -->
      <div class="flex items-center gap-1.5">
        <!-- Search -->
        <div class="hidden md:flex items-center bg-surface rounded-lg px-2.5 py-1.5 gap-1.5 border-1.5 border-transparent
                    focus-within:border-brand-500 focus-within:bg-card focus-within:shadow-[0_0_0_3px_rgba(16,185,129,.08)]
                    transition-all duration-200 w-45">
          <span class="material-icons-outlined text-[17px] text-muted/70">search</span>
          <input type="text" placeholder="Cari menu..." x-model="searchQuery" @keydown.enter="doSearch()"
                 class="bg-transparent outline-none border-none text-[12.5px] text-foreground placeholder:text-muted/70 w-full font-body">
        </div>

        <!-- Notifications -->
        <button @click="toast('Tidak ada notifikasi baru','info')" class="relative w-8 h-8 rounded-lg bg-surface hover:bg-border flex items-center justify-center transition-colors" aria-label="Notifikasi">
          <span class="material-icons-outlined cursor-pointer text-[18px] text-muted">notifications_none</span>
          <span class="absolute -top-0.5 -right-0.5 w-3.5 h-3.5 bg-red-500 rounded-full text-[7px] text-white font-bold flex items-center justify-center ring-2 ring-card">3</span>
        </button>

        <!-- Theme Cycle -->
        <button @click="cycleTheme()" class="w-8 h-8 rounded-lg bg-surface hover:bg-border flex items-center justify-center transition-colors" :title="'Tema: ' + themeLabel" aria-label="Ganti Tema">
          <span class="material-icons-outlined cursor-pointer text-[18px] text-muted" x-text="themeIcon"></span>
        </button>

        <!-- User Dropdown -->
        <div class="relative" @click.outside="userDropdown = false">
          <button @click="userDropdown = !userDropdown"
                  class="flex items-center gap-1 py-1 px-1.5 cursor-pointer rounded-lg hover:bg-surface transition-colors">
            <img src="https://picsum.photos/seed/neo-usr/40/40.jpg" class="w-7 h-7 rounded-full object-cover" alt="">
            <span class="material-icons-outlined text-[14px] text-muted">expand_more</span>
          </button>
          <!-- Dropdown Menu -->
          <div x-show="userDropdown"
               x-transition:enter="transition ease-out duration-150"
               x-transition:enter-start="opacity-0 -translate-y-1"
               x-transition:enter-end="opacity-100 translate-y-0"
               x-transition:leave="transition ease-in duration-100"
               x-transition:leave-start="opacity-100 translate-y-0"
               x-transition:leave-end="opacity-0 -translate-y-1"
               class="absolute right-0 top-full mt-1.5 bg-card border border-card-border rounded-xl shadow-lg dark:shadow-black/40
                      min-w-42.5 z-50 py-1">
            <button @click="navigate('profil'); userDropdown = false"
                    class="flex items-center gap-2 px-3 py-2 text-[12.5px] cursor-pointer rounded-lg text-muted hover:bg-surface hover:text-foreground w-full transition-colors">
              <span class="material-icons-outlined text-[17px]">person</span>Profil
            </button>
            <button @click="navigate('settings.index'); userDropdown = false"
                    class="flex items-center gap-2 px-3 py-2 text-[12.5px] cursor-pointer rounded-lg text-muted hover:bg-surface hover:text-foreground w-full transition-colors">
              <span class="material-icons-outlined text-[17px]">settings</span>Pengaturan
            </button>
            <div class="border-t border-border my-1"></div>
            <button @click="toast('Berhasil keluar','info'); userDropdown = false"
                    class="flex items-center gap-2 px-3 py-2 text-[12.5px] cursor-pointer rounded-lg text-muted hover:bg-surface hover:text-foreground w-full transition-colors">
              <span class="material-icons-outlined text-[17px]">logout</span>Keluar
            </button>
          </div>
        </div>
      </div>
    </header>
