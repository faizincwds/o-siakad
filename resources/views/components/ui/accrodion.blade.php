@props([
    'title'
])

<div
    x-data="{open:false}"
    class="border border-card-border rounded-lg"
>

    <button
        @click="open=!open"
        class="w-full px-4 py-3 text-left"
    >
        {{ $title }}
    </button>

    <div
        x-show="open"
        class="p-4 border-t border-card-border"
    >
        {{ $slot }}
    </div>

</div>
