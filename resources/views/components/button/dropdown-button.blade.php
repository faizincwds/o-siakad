@props([
    'text' => 'Menu',
    'icon' => 'expand_more',
    'variant' => 'secondary'
])

<div
    x-data="{ open:false }"
    class="relative inline-block"
>

    <x-button.button
        :variant="$variant"
        @click="open=!open"
    >
        {{ $text }}

        <span class="material-icons-outlined icon-sm">
            {{ $icon }}
        </span>
    </x-button.button>

    <div
        x-show="open"
        x-transition
        @click.outside="open=false"
        class="absolute right-0 z-50 mt-2 min-w-52 overflow-hidden rounded-xl border border-card-border bg-card shadow-lg"
    >
        <div class="py-2">
            {{ $slot }}
        </div>
    </div>

</div>