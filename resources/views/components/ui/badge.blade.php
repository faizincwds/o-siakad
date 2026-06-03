@props([
    'variant' => 'primary'
])

@php

$variants = [

'primary' => 'bg-brand-100 text-brand-700',
'success' => 'bg-green-100 text-green-700',
'danger' => 'bg-red-100 text-red-700',
'warning' => 'bg-yellow-100 text-yellow-700',
'info' => 'bg-blue-100 text-blue-700',

];

@endphp

<span
    {{
        $attributes->merge([
            'class' => 'inline-flex px-2 py-1 rounded-full text-xs font-semibold '.$variants[$variant]
        ])
    }}
>
    {{ $slot }}
</span>
