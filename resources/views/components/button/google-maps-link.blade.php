@props([
    'query' => null,
    'lat' => null,
    'lng' => null,

    'size' => 'md',
    'variant' => 'primary',
    'block' => false,
    'icon' => 'location_on',
])

@php

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
        border-brand-600
    ',

    'success' => '
        bg-emerald-600 text-white
        hover:bg-emerald-700
        border-emerald-600
    ',

    'outline' => '
        border-gray-300
        hover:bg-surface
        text-foreground
    ',

    'ghost' => '
        border-transparent
        hover:bg-surface
        text-foreground
    ',

];

$url = '#';

if ($lat && $lng) {

    $url = "https://www.google.com/maps?q={$lat},{$lng}";

} elseif ($query) {

    $url = "https://www.google.com/maps/search/?api=1&query=" . urlencode($query);

}

@endphp

<a
    href="{{ $url }}"
    target="_blank"
    rel="noopener noreferrer"
    {{
        $attributes->merge([
            'class' => '
                inline-flex items-center justify-center gap-2
                rounded-md border
                font-medium
                transition-all duration-200
                ' .
                ($block ? 'w-full ' : '') .
                $sizes[$size] . ' ' .
                $variants[$variant]
        ])
    }}
>

    <span class="material-icons-outlined text-[18px]">
        {{ $icon }}
    </span>

    {{ $slot ?: 'Buka Google Maps' }}

</a>
