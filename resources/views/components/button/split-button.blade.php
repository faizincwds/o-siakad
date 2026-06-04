@props([
    'text' => 'Action',
    'variant' => 'primary',
])

<div
    x-data="{ open:false }"
    class="relative inline-flex"
>

    <x-button.button
        :variant="$variant"
        class="rounded-r-none"
    >
        {{ $text }}
    </x-button.button>

    <button
        type="button"
        @click="open=!open"
        class="
            inline-flex items-center
            rounded-r-lg px-3
            bg-brand-700 text-white
            hover:bg-brand-800
        "
    >
        <span class="material-icons-outlined icon-sm">
            expand_more
        </span>
    </button>

    <div
        x-show="open"
        x-transition
        @click.outside="open=false"
        class="
            absolute right-0 top-full z-50 mt-2
            min-w-56 overflow-hidden
            rounded-xl border border-card-border
            bg-card shadow-lg
        "
    >
        <div class="py-2">
            {{ $slot }}
        </div>
    </div>

</div>
