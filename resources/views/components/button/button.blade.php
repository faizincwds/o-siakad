@props([
    'type' => 'submit',
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null,
    'iconPosition' => 'left',
    'loading' => false,
    'block' => false,
])

@php

$base = '
inline-flex items-center justify-center gap-1
font-medium transition-all duration-200
focus:outline-none focus:ring-1
cursor-pointer
disabled:pointer-events-none disabled:opacity-50
rounded-md
';

$sizes = [
    'xs' => 'px-2 py-1 text-xs',
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-4 py-2.5 text-sm',
    'lg' => 'px-5 py-3 text-base',
    'xl' => 'px-6 py-3.5 text-lg',
];

$variants = [
    'primary' => 'bg-brand-600 text-white hover:bg-brand-700',
    'secondary' => 'bg-card border border-card-border text-foreground hover:bg-surface',
    'success' => 'bg-emerald-600 text-white hover:bg-emerald-700',
    'warning' => 'bg-amber-500 text-white hover:bg-amber-600',
    'danger' => 'bg-red-600 text-white hover:bg-red-700',
    'info' => 'bg-sky-600 text-white hover:bg-sky-700',
    'outline' => 'border border-card-border bg-transparent text-foreground hover:bg-surface',
    'ghost' => 'text-foreground hover:bg-surface',
];

@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
            $base.' '.
            ($sizes[$size] ?? $sizes['md']).' '.
            ($variants[$variant] ?? $variants['primary']).' '.
            ($block ? 'w-full' : '')
    ]) }}
>

    @if($loading)
        <span class="material-icons-outlined icon-md animate-spin">
            progress_activity
        </span>
    @endif

    @if($icon && $iconPosition === 'left' && !$loading)
        <span class="material-icons-outlined icon-md">
            {{ $icon }}
        </span>
    @endif

    <span>{{ $slot }}</span>

    @if($icon && $iconPosition === 'right' && !$loading)
        <span class="material-icons-outlined icon-md">
            {{ $icon }}
        </span>
    @endif

</button>
