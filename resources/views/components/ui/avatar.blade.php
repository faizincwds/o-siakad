@props([
    'src' => null,
    'name' => '',
    'size' => 'md'
])

@php

$sizes = [

'sm'=>'w-8 h-8',
'md'=>'w-10 h-10',
'lg'=>'w-14 h-14',
'xl'=>'w-20 h-20',

];

@endphp

@if($src)

<img
    src="{{ $src }}"
    alt="{{ $name }}"
    class="{{ $sizes[$size] }} rounded-full object-cover"
/>

@else

<div
    class="{{ $sizes[$size] }}
    rounded-full bg-brand-500 text-white
    flex items-center justify-center font-semibold"
>
    {{ strtoupper(substr($name,0,1)) }}
</div>

@endif
