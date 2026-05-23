export default function themesUI() {
  return {
    /* ─── State ─── */
    //activePage: 'dashboard',
    // activePage: '{{ Route::currentRouteName() }}',
    activePage: window.appConfig.pageMeta[window.appConfig.activePage] ? window.appConfig.activePage : 'dashboard',
    collapsed: false,
    _sidebarWidth: 260,
    windowWidth: window.innerWidth,
    mobileSidebar: false,
    userDropdown: false,
    openMenus: [],
    searchQuery: '',
    theme: 'light',
    isDark: false,
    toasts: [],

    /* ─── Menu Definition ─── */
    menuItems: window.appConfig.menuItems,

    /* ─── Page Meta ─── */
    pageMeta: window.appConfig.pageMeta,

    /* ─── Theme Options ─── */
    themeOpts: window.appConfig.themeOpts,

    /* ─── Computed ─── */
    get themeIcon() {
      return { light: 'light_mode', dark: 'dark_mode' }[this.theme] || 'light_mode';
    },
    get themeLabel() {
      return { light: 'Terang', dark: 'Gelap' }[this.theme] || 'Terang';
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

    /* ─── Navigation ─── */
    navigate(pageId) {
      // Cek dulu apa rutenya ada? Kalau belum ada, pakai '#'
        const url = window.appConfig.routes[pageId] || '#'
        this.activePage = pageId;
        this.mobileSidebar = false;
        this.userDropdown = false;
        // Auto-expand parent if child is selected
        this.menuItems.forEach((item, idx) => {
            if (item.children && item.children.some(c => c.id === pageId)) {
                // if (!this.openMenus.includes(idx)) this.openMenus.push(idx);
                this.openMenus = [idx]
            }
        });

        window.scrollTo({ top: 0, behavior: 'smooth' })
            // Redirect
            if (url !== '#') {
            setTimeout(() => {
                window.location.assign(url)
            }, this.windowWidth <= 1024 ? 250 : 80)
    }
    },

    isParentActive(item) {
      return item.children && item.children.some(c => c.id === this.activePage);
    },

    toggleSubmenu(idx) {
    //   const i = this.openMenus.indexOf(idx);
    //   i === -1 ? this.openMenus.push(idx) : this.openMenus.splice(i, 1);
        if (this.openMenus.includes(idx)) {
            this.openMenus = this.openMenus.filter( i => i !== idx )
        } else {
            this.openMenus.push(idx)
        }
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
      }
    },

    /* ─── Theme ─── */
    setTheme(mode) {
      this.theme = mode;
      localStorage.setItem('nf-theme', mode);
      this.applyTheme();
    },
    applyTheme() {
      this.isDark = this.theme === 'dark';
      document.documentElement.classList.toggle(
            'dark',
            this.isDark
        );
    },
    cycleTheme() {
      const order = ['light', 'dark'];
      const next = order[(order.indexOf(this.theme) + 1) % order.length];
      this.setTheme(next);
      this.toast('Tema: ' + this.themeLabel, 'info');
    },

    /* ─── Toast ─── */
    toast(msg, type = 'info') {
      const id = Date.now() + Math.random();
      this.toasts.push({ id, msg, type, out: false });
      setTimeout(() => {
        const t = this.toasts.find(x => x.id === id);
        if (t) t.out = true;
        setTimeout(() => { this.toasts = this.toasts.filter(x => x.id !== id); }, 250);
      }, 2800);
    },

    /* ─── Search ─── */
    doSearch() {
      const q = this.searchQuery.trim().toLowerCase();
      if (!q) return;
      for (const item of this.menuItems) {
        if (item.id && (item.label || '').toLowerCase().includes(q)) { this.navigate(item.id); this.searchQuery = ''; return; }
        if (item.children) {
          for (const child of item.children) {
            if ((child.label || '').toLowerCase().includes(q)) { this.navigate(child.id); this.searchQuery = ''; return; }
          }
        }
      }
    },

    /* ─── Init ─── */
    init() {
        this.windowWidth = window.innerWidth;
        window.addEventListener('resize', () => { this.windowWidth = window.innerWidth });
        this.menuItems.forEach((item, idx) => {
            if ( item.children && item.children.some(c => c.id === this.activePage)) {
                this.openMenus.push(idx)
            }
            });
        const saved = localStorage.getItem('nf-theme');
        if (['light', 'dark'].includes(saved)) this.theme = saved;
        this.applyTheme();
    }
  };
}
