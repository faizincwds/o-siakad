  <div class="fixed bottom-3.5 right-3.5 z-999 flex flex-col gap-1.5">
    <template x-for="t in toasts" :key="t.id">
      <div x-show="!t.out"
           x-transition:enter="transition ease-out duration-250"
           x-transition:enter-start="opacity-0 translate-y-2 scale-[.97]"
           x-transition:enter-end="opacity-100 translate-y-0 scale-100"
           x-transition:leave="transition ease-in duration-200"
           x-transition:leave-start="opacity-100 translate-y-0 scale-100"
           x-transition:leave-end="opacity-0 translate-y-1.5 scale-[.97]"
           class="bg-slate-900 dark:bg-slate-800 text-white px-3.5 py-2 rounded-xl text-[12.5px] flex items-center gap-2 shadow-[0_6px_24px_rgba(0,0,0,.18)] max-w-75">
        <span class="material-icons-outlined text-[17px]"
              :class="{ 'text-emerald-400': t.type === 'success', 'text-blue-400': t.type === 'info', 'text-red-400': t.type === 'error' }"
              x-text="t.type === 'success' ? 'check_circle' : t.type === 'error' ? 'error' : 'info'"></span>
        <span x-text="t.msg"></span>
      </div>
    </template>
  </div>
