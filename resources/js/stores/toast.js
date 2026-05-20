export default function toastUI() {
    return {
        toasts: [],

        /* ─── Toast ─── */
        toast(msg, type = 'info') {
        const id = Date.now() + Math.random();
        this.toasts.push({ id, msg, type, out: false });
        setTimeout(() => {
            const t = this.toasts.find(x => x.id === id);
            if (t) t.out = true;
            setTimeout(() => { this.toasts = this.toasts.filter(x => x.id !== id); }, 250);
        }, 3000);
        },
    }
}
