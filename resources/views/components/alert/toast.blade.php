@props([
    'type' => 'success',
    'title' => null,
    'duration' => 3000,
])

@php

$colors = [
    'success' => 'bg-green-600',
    'error'   => 'bg-red-600',
    'warning' => 'bg-yellow-500',
    'info'    => 'bg-blue-600',
];

$icons = [
    'success' => 'check_circle',
    'error'   => 'error',
    'warning' => 'warning',
    'info'    => 'info',
];

@endphp

<div
    x-data="{ show:true }"
    x-init="setTimeout(() => show=false, {{ $duration }})"
    x-show="show"
    x-transition
    class="fixed right-5 top-5 z-9999"
>

    <div class="min-w-[320px] max-w-md rounded-xl shadow-xl text-white overflow-hidden">

        <div class="{{ $colors[$type] }} flex items-start gap-3 p-4">

            <span class="material-icons-outlined">
                {{ $icons[$type] }}
            </span>

            <div class="flex-1">

                @if($title)
                    <div class="font-semibold">
                        {{ $title }}
                    </div>
                @endif

                <div class="text-sm opacity-90">
                    {{ $slot }}
                </div>

            </div>

            <button
                @click="show=false"
                class="material-icons-outlined text-sm opacity-70 hover:opacity-100"
            >
                close
            </button>

        </div>

    </div>

</div>
