export default function themesAuth() {
  return {
    /* ─── State ─── */
    windowWidth: window.innerWidth,
    theme: 'light',
    isDark: false,
    toasts: [],

    /* ─── Theme Options ─── */

    themeOpts: [
        { id: 'light', icon: 'light_mode', label: 'Terang' },
        { id: 'dark', icon: 'dark_mode', label: 'Gelap' },
    ],


    /* ─── Computed ─── */
    get themeIcon() {
      return { light: 'light_mode', dark: 'dark_mode' }[this.theme] || 'light_mode';
    },
    get themeLabel() {
      return { light: 'Terang', dark: 'Gelap' }[this.theme] || 'Terang';
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


    /* ─── Init ─── */
    init() {
        this.windowWidth = window.innerWidth;
        window.addEventListener('resize', () => { this.windowWidth = window.innerWidth });
        const saved = localStorage.getItem('nf-theme');
        if (['light', 'dark'].includes(saved)) this.theme = saved;
        this.applyTheme();
    }
  };
}
