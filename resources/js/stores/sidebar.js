export default function sidebarUI() {
    return {
        collapsed: false,

        mobileSidebar: false,

        _sidebarWidth: 260,

        windowWidth: window.innerWidth,

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
    }
}
