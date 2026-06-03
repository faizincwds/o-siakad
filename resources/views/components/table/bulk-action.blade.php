@props([
    'count' => 0
])

<div
    class="
        flex
        items-center
        gap-3
        px-4
        py-2
        rounded-lg
        bg-brand-50
        text-brand-700
    "
>

    <span class="font-medium">
        {{ $count }} dipilih
    </span>

    {{ $slot }}

</div>
