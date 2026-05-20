  <aside
    class="fixed top-0 left-0 bottom-0 z-50 w-65 overflow-y-auto overflow-x-hidden
           bg-sidebar border-r border-sidebar-border
           transition-transform duration-300 ease-in-out
           max-lg:-translate-x-full"
    :class="{ 'lg:-translate-x-full': collapsed, 'max-lg:translate-x-0': mobileSidebar }">

    <!-- ─── Logo ─── -->
    <div class="flex items-center gap-2.5 px-4 h-17 border-b border-sidebar-border">
      <div class="w-8 h-8 rounded-lg bg-brand-500/10 flex items-center justify-center shrink-0">
        <span class="material-icons-outlined text-[17px] text-brand-500">school</span>
      </div>
      <div>
        <div class="font-display font-bold text-[13.5px] leading-tight tracking-tight text-brand-700 dark:text-brand-100">e-SIAKAD | STITUSA</div>
        <div class="text-[8px] font-semibold tracking-[.12em] uppercase text-brand-500/50 dark:text-brand-300/25">Versi: 0.1.3</div>
      </div>
    </div>

    <!-- ─── Navigation ─── -->
    <nav class="py-2">
      <template x-for="(item, idx) in menuItems" :key="item.id || item.label">
        <div>
          <!-- Simple menu item -->
          <template x-if="!item.children">
            <button
              @click="navigate(item.id)"
              class="flex items-center gap-2.5 px-4 py-2 mx-2 rounded-lg text-[12.5px] font-medium
                     text-sidebar-muted hover:bg-black/4 hover:text-sidebar-text
                     dark:hover:bg-white/6 dark:hover:text-sidebar-text
                     transition-all duration-150 w-full text-left select-none"
              :class="{ 'bg-brand-500/8 text-brand-700 dark:text-brand-100 shadow-[inset_3px_0_0_var(--color-brand-500)]': activePage === item.id }">
              <span class="material-icons-outlined text-[18px] shrink-0" x-text="item.icon"></span>
              <span class="truncate" x-text="item.label"></span>
            </button>
          </template>

          <!-- Parent menu item with children -->
          <template x-if="item.children">
            <div>
              <button
                @click="toggleSubmenu(idx)"
                class="flex items-center gap-2.5 px-4 py-2 mx-2 rounded-lg text-[12.5px] font-medium
                       text-sidebar-muted hover:bg-black/4 hover:text-sidebar-text
                       dark:hover:bg-white/6 dark:hover:text-sidebar-text
                       transition-all duration-150 w-full text-left select-none"
                :class="{ 'bg-brand-500/8 text-brand-700 dark:text-brand-100 shadow-[inset_3px_0_0_var(--color-brand-500)]': isParentActive(item) }">
                <span class="material-icons-outlined text-[18px] shrink-0" x-text="item.icon"></span>
                <span class="truncate flex-1" x-text="item.label"></span>
                <span class="material-icons-outlined text-[16px] opacity-30 transition-transform duration-200"
                      :class="{ 'rotate-180 opacity-80': openMenus.includes(idx) }">expand_more</span>
              </button>
              <!-- Submenu with CSS grid animation -->
              <div class="submenu" :class="{ 'open': openMenus.includes(idx) }">
                <div>
                  <template x-for="child in item.children" :key="child.id">
                    <button
                      @click="navigate(child.id)"
                      class="flex items-center gap-1.5 pl-12 pr-4 py-1.5 mx-2 rounded-md text-[12.5px]
                             text-sidebar-dim hover:bg-black/3 hover:text-brand-700
                             dark:hover:bg-white/4 dark:hover:text-brand-300
                             transition-all duration-150 w-full text-left select-none"
                      :class="{ 'text-brand-500 bg-brand-500/8': activePage === child.id }">
                      <span class="w-1 h-1 rounded-full bg-sidebar-dim dark:bg-white/10 shrink-0"
                            :class="{ 'bg-brand-500': activePage === child.id }"></span>
                      <span x-text="child.label"></span>
                    </button>
                  </template>
                </div>
              </div>
            </div>
          </template>
        </div>
      </template>
    </nav>
  </aside>
