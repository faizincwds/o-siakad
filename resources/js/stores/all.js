export default function themesUI() {
  return {
    /* ─── State ─── */
    activePage: window.appConfig.activePage,
    routes: window.appConfig.routes,
    collapsed: JSON.parse(localStorage.getItem('sidebar')) ?? false,
    _sidebarWidth: 260,
    windowWidth: window.innerWidth,
    mobileSidebar: false,
    userDropdown: false,
    openMenus: [],
    searchQuery: '',
    theme: 'light',
    isDark: false,
    toasts: [],
    loaded: false,

    /* ─── Menu Definition ─── */
    menuItems: window.appConfig.menuItems,

    /* ─── Page Meta ─── */
    pageMeta: window.appConfig.pageMeta,

    /* ─── Theme Options ─── */
    themeOpts: window.appConfig.themeOpts,

    /* ─── Computed ─── */
    get themeIcon() {
      return this.theme === 'dark' ? 'dark_mode' : 'light_mode';
    },
    get themeLabel() {
      return this.theme === 'dark' ? 'Dark' : 'Light';
    },
    get pageIcon() {
      return (this.pageMeta[this.activePage] || {}).icon || 'widgets';
    },
    get pageTitle() {
      return (this.pageMeta[this.activePage] || {}).title || '';
    },
    get pageDesc() {
      return (this.pageMeta[this.activePage] || {}).desc || '';
    },
    get breadcrumbs() {
      return (this.pageMeta[this.activePage] || {}).crumbs || ['Dashboard'];
    },

    /* ─── Navigation (Full Page Redirect) ─── */
    navigate(routeName) {
      if (!routeName) return;

      this.mobileSidebar = false;
      this.userDropdown = false;

      const url = this.routes[routeName];
      if (!url) {
        this.toast('Route is not registered', 'error');
        return;
      }
      // Gunakan View Transitions API jika browser mendukung (Chrome, Edge, Safari)
      if (document.startViewTransition) {
        document.startViewTransition(() => {
          window.location.href = url;
        });
      } else {
        // Fallback biasa untuk browser lama (Firefox versi lama, dll)
        window.location.href = url;
      }

    },

    isParentActive(item) {
      return item.children?.some(c => c.route === this.activePage) || false;
    },

    toggleSubmenu(idx) {
      const index = this.openMenus.indexOf(idx);
      index === -1 ? this.openMenus.push(idx) : this.openMenus.splice(index, 1);
    },

    /* ─── Sidebar ─── */
    get sidebarOffset() {
      if (this.windowWidth <= 1024) return 0;
      return this.collapsed ? 0 : this._sidebarWidth;
    },
    toggleSidebar() {
      if (this.windowWidth <= 1024) {
        this.mobileSidebar = !this.mobileSidebar;
      } else {
        this.collapsed = !this.collapsed;
        localStorage.setItem('sidebar', JSON.stringify(this.collapsed));
      }
    },

    /* ─── Theme ─── */
    setTheme(mode) {
      this.theme = mode;
      localStorage.setItem('nf-theme', mode);
      this.isDark = this.theme === 'dark';
    },
    applyTheme() {
      this.isDark = this.theme === 'dark';
    },
    cycleTheme() {
      const next = this.theme === 'light' ? 'dark' : 'light';
      this.setTheme(next);
      this.toast('Theme: ' + this.themeLabel, 'info');
    },

    /* ─── Toast ─── */
    toast(msg, type = 'info') {
      const id = Date.now() + Math.random();
      this.toasts.push({ id, msg, type, out: false });

      setTimeout(() => {
        const t = this.toasts.find(x => x.id === id);
        if (t) t.out = true;
        setTimeout(() => {
          this.toasts = this.toasts.filter(x => x.id !== id);
        }, 250);
      }, 2800);
    },

    /* ─── Search ─── */
    doSearch() {
      const q = this.searchQuery.trim().toLowerCase();
      if (!q) return;

      for (const item of this.menuItems) {
        if (item.route && item.label?.toLowerCase().includes(q)) {
          this.navigate(item.route);
          this.searchQuery = '';
          return;
        }
        if (item.children) {
          for (const child of item.children) {
            if (child.label?.toLowerCase().includes(q)) {
              this.navigate(child.route);
              this.searchQuery = '';
              return;
            }
          }
        }
      }
    },

    /* ─── Init ─── */
    init() {
      this.windowWidth = window.innerWidth;
      window.addEventListener('resize', () => {
        this.windowWidth = window.innerWidth;
      });

      this.$nextTick(() => {
        this.loaded = true
    })

      // Auto-open active parent menus
      this.menuItems.forEach((item, idx) => {
        if (item.children?.some(c => c.route === this.activePage)) {
          this.openMenus.push(idx);
        }
      });

      // Apply saved theme
      const saved = localStorage.getItem('nf-theme');
      if (saved === 'light' || saved === 'dark') {
        this.theme = saved;
      }
      this.applyTheme();
    }
  };
}

// Daftarkan ke window agar bisa dipanggil oleh x-data di HTML
window.themesUI = themesUI;
