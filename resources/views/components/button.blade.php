@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'icon' => null
])

@php

$base = '
    cursor-pointer
    inline-flex items-center justify-center gap-2
    rounded-xl
    font-medium
    transition-all duration-200
    focus:outline-none
    focus:ring-2
    disabled:opacity-50
    disabled:pointer-events-none
';

$sizes = [

    'xs' => 'px-2.5 py-1.5 text-xs',
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-4 py-2.5 text-sm',
    'lg' => 'px-5 py-3 text-base',

];

$variants = [

    'primary' => '
        bg-brand-600 text-white
        hover:bg-brand-700
        focus:ring-brand-500/30
    ',

    'secondary' => '
        bg-gray-100 text-gray-700
        hover:bg-gray-200
        dark:bg-gray-800
        dark:text-gray-200
        dark:hover:bg-gray-700
    ',

    'success' => '
        bg-emerald-600 text-white
        hover:bg-emerald-700
    ',

    'warning' => '
        bg-amber-500 text-white
        hover:bg-amber-600
    ',

    'danger' => '
        bg-red-600 text-white
        hover:bg-red-700
    ',

    'outline' => '
        border border-gray-300
        bg-transparent
        hover:bg-gray-50
        dark:border-gray-700
        dark:hover:bg-gray-800
    ',

    'ghost' => '
        bg-transparent
        hover:bg-gray-100
        dark:hover:bg-gray-800
    '

];

@endphp

<button
    type="{{ $type }}"
    {{
        $attributes->merge([
            'class' =>
                $base . ' ' .
                $sizes[$size] . ' ' .
                $variants[$variant]
        ])
    }}
>

    @if($icon)
        <span class="material-icons-outlined text-[18px]">
            {{ $icon }}
        </span>
    @endif

    {{ $slot }}

</button>
