@props([
    'icon',
    'variant' => 'ghost',
    'size' => 'md',
])

@php

$sizes = [
    'xs' => 'h-7 w-7',
    'sm' => 'h-8 w-8',
    'md' => 'h-10 w-10',
    'lg' => 'h-11 w-11',
    'xl' => 'h-12 w-12',
];

@endphp

<x-button.button
    :variant="$variant"
    class="{{ $sizes[$size] ?? $sizes['md'] }} p-0"
    {{ $attributes }}
>
    <span class="material-icons-outlined icon-md">
        {{ $icon }}
    </span>
</x-button.button>