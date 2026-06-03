@props([
    'provider' => 'google',
    'href' => '#',

    'size' => 'md',
    'variant' => 'solid',

    'block' => false,
    'iconOnly' => false,
])

@php

$providers = [

    'google' => [
        'icon' => 'G',
        'color' => 'red',
        'label' => 'Google',
    ],

    'facebook' => [
        'icon' => 'f',
        'color' => 'blue',
        'label' => 'Facebook',
    ],

    'github' => [
        'icon' => '⌘',
        'color' => 'slate',
        'label' => 'GitHub',
    ],

    'microsoft' => [
        'icon' => '⊞',
        'color' => 'sky',
        'label' => 'Microsoft',
    ],

];

$config = $providers[$provider] ?? $providers['google'];

$sizes = [

    'xs' => 'px-2.5 py-1.5 text-xs',
    'sm' => 'px-3 py-2 text-sm',
    'md' => 'px-4 py-2.5 text-sm',
    'lg' => 'px-5 py-3 text-base',

];

$variants = [

    'solid' => [

        'red' => 'bg-red-600 text-white border-red-600 hover:bg-red-700',
        'blue' => 'bg-blue-600 text-white border-blue-600 hover:bg-blue-700',
        'sky' => 'bg-sky-600 text-white border-sky-600 hover:bg-sky-700',
        'slate' => 'bg-slate-900 text-white border-slate-900 hover:bg-slate-800',

    ],

    'outline' => [

        'red' => 'border-red-600 text-red-600 hover:bg-red-50',
        'blue' => 'border-blue-600 text-blue-600 hover:bg-blue-50',
        'sky' => 'border-sky-600 text-sky-600 hover:bg-sky-50',
        'slate' => 'border-slate-500 text-slate-700 hover:bg-slate-50 dark:text-slate-300',

    ],

    'soft' => [

        'red' => 'bg-red-100 text-red-700 border-red-100 hover:bg-red-200',
        'blue' => 'bg-blue-100 text-blue-700 border-blue-100 hover:bg-blue-200',
        'sky' => 'bg-sky-100 text-sky-700 border-sky-100 hover:bg-sky-200',
        'slate' => 'bg-slate-100 text-slate-700 border-slate-100 hover:bg-slate-200',

    ],

    'ghost' => [

        'red' => 'border-transparent text-red-600 hover:bg-red-50',
        'blue' => 'border-transparent text-blue-600 hover:bg-blue-50',
        'sky' => 'border-transparent text-sky-600 hover:bg-sky-50',
        'slate' => 'border-transparent text-slate-700 hover:bg-slate-100 dark:text-slate-300',

    ],

];

$style = $variants[$variant][$config['color']];

@endphp

<a
    href="{{ $href }}"
    {{
        $attributes->merge([
            'class' => '
                inline-flex items-center justify-center gap-2
                rounded-md border
                font-medium
                transition-all duration-200
                focus:outline-none focus:ring-2
                disabled:pointer-events-none
                disabled:opacity-50
                ' .

                ($block ? 'w-full ' : '') .

                $sizes[$size] . ' ' .

                $style
        ])
    }}
>

    <span class="font-bold shrink-0">
        {{ $config['icon'] }}
    </span>

    @unless($iconOnly)
        <span>
            Login dengan {{ $config['label'] }}
        </span>
    @endunless

</a>
