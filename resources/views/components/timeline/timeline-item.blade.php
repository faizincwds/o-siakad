@props([
    'title',
    'description' => null,
    'date' => null,
    'icon' => 'check_circle',
    'color' => 'success',
])

@php

$colors = [

    'success' => '
        bg-emerald-100
        text-emerald-600
        border-emerald-200
    ',

    'danger' => '
        bg-red-100
        text-red-600
        border-red-200
    ',

    'warning' => '
        bg-amber-100
        text-amber-600
        border-amber-200
    ',

    'info' => '
        bg-sky-100
        text-sky-600
        border-sky-200
    ',

    'primary' => '
        bg-brand-100
        text-brand-600
        border-brand-200
    ',

];

@endphp

<div class="relative pl-10 pb-8 last:pb-0">

    {{-- LINE --}}
    <div
        class="absolute left-4 top-0 bottom-0 w-px bg-border last:hidden"
    ></div>

    {{-- ICON --}}
    <div
        class="
            absolute
            left-0
            top-0
            w-8
            h-8
            rounded-full
            border
            flex
            items-center
            justify-center

            {{ $colors[$color] ?? $colors['primary'] }}
        "
    >

        <span
            class="material-icons-outlined text-h6"
        >
            {{ $icon }}
        </span>

    </div>

    {{-- CONTENT --}}
    <div>

        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-1"
        >

            <h4
                class="font-semibold text-foreground"
            >
                {{ $title }}
            </h4>

            @if($date)

                <span
                    class="text-xs text-muted"
                >
                    {{ $date }}
                </span>

            @endif

        </div>

        @if($description)

            <p
                class="mt-1 text-sm text-muted"
            >
                {{ $description }}
            </p>

        @endif

        @if(trim($slot))

            <div
                class="mt-3"
            >
                {{ $slot }}
            </div>

        @endif

    </div>

</div>
