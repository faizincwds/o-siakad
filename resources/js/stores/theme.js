export default function themesUI() {
    return {
        theme: 'system',

        isDark: false,

        _sysMq: null,

        init() {
            this._sysMq = window.matchMedia('(prefers-color-scheme: dark)');
            this._sysMq.addEventListener('change', () => { if (this.theme === 'system') this.applyTheme(); });
            const saved = localStorage.getItem('nf-theme');
            if (['light', 'dark', 'system'].includes(saved)) this.theme = saved;
            this.applyTheme();
        },

        /* ─── Theme Options ─── */
        themeOpts: [
            { id: 'light',  icon: 'light_mode',      label: 'Terang' },
            { id: 'dark',   icon: 'dark_mode',        label: 'Gelap' },
            { id: 'system', icon: 'settings_suggest', label: 'Sistem' },
        ],

        /* ─── Computed ─── */
        get themeIcon() {
        return { light: 'light_mode', dark: 'dark_mode', system: 'brightness_auto' }[this.theme] || 'brightness_auto';
        },
        get themeLabel() {
        return { light: 'Terang', dark: 'Gelap', system: 'Sistem' }[this.theme] || 'Sistem';
        },

        /* ─── Theme ─── */
        setTheme(mode) {
        this.theme = mode;
        localStorage.setItem('nf-theme', mode);
        this.applyTheme();
        },

        applyTheme() {
        this.isDark = this.theme === 'dark' || (this.theme === 'system' && this._sysMq && this._sysMq.matches);
        },

        cycleTheme() {
        const order = ['light', 'dark', 'system'];
        const next = order[(order.indexOf(this.theme) + 1) % order.length];
        this.setTheme(next);
        this.toast('Tema: ' + this.themeLabel, 'info');
        },


    }
}


