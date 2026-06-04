@props([
    'href' => '#',
    'variant' => 'primary',
    'icon' => null,
])

@php

$variants = [
    'primary' => 'bg-brand-600 text-white hover:bg-brand-700',
    'secondary' => 'bg-card border border-card-border text-foreground hover:bg-surface',
    'success' => 'bg-emerald-600 text-white hover:bg-emerald-700',
    'danger' => 'bg-red-600 text-white hover:bg-red-700',
];

@endphp

<a
    href="{{ $href }}"
    {{
        $attributes->merge([
            'class' => '
                inline-flex items-center gap-2
                rounded-lg px-4 py-2.5
                text-sm font-medium transition-all
                '.($variants[$variant] ?? $variants['primary'])
        ])
    }}
>

    @if($icon)
        <span class="material-icons-outlined icon-md">
            {{ $icon }}
        </span>
    @endif

    {{ $slot }}

</a>
