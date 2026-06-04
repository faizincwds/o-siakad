@props([
    'href' => '#',
    'variant' => 'primary',
    'icon' => null,
    'type' => 'link', // link | submit
])

@php
$variants = [
    'default' => 'bg-surface text-foreground hover:bg-surface/80',
    'primary' => 'bg-brand-600 rounded-lg text-white hover:bg-brand-700',
    'secondary' => 'bg-card rounded-lg border border-card-border text-foreground hover:bg-surface',
    'success' => 'bg-emerald-600 rounded-lg text-white hover:bg-emerald-700',
    'danger' => 'bg-red-600 rounded-lg text-white hover:bg-red-700',
];

$classes = '
    inline-flex items-center gap-2
    px-4 py-2.5 cursor-pointer
    text-sm font-medium transition-all
    ' . ($variants[$variant] ?? $variants['primary']);
@endphp

@if($type === 'submit')

    <button
        type="submit"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        @if($icon)
            <span class="material-icons-outlined icon-md">
                {{ $icon }}
            </span>
        @endif

        {{ $slot }}
    </button>

@else

    <a
        href="{{ $href }}"
        {{ $attributes->merge(['class' => $classes]) }}
    >
        @if($icon)
            <span class="material-icons-outlined icon-md">
                {{ $icon }}
            </span>
        @endif

        {{ $slot }}
    </a>

@endif
