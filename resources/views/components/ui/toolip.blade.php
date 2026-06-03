@props([
    'text'
])

<div
    x-data="{show:false}"
    class="relative inline-block"
>

    <div
        @mouseenter="show=true"
        @mouseleave="show=false"
    >
        {{ $slot }}
    </div>

    <div
        x-show="show"
        class="
        absolute bottom-full mb-2
        px-2 py-1
        bg-black text-white
        text-xs rounded
        "
    >
        {{ $text }}
    </div>

</div>
