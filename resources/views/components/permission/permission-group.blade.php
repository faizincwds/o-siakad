@props([
    'title' => '',
    'icon' => 'folder',
])

<div
    class="
        bg-card
        border
        border-card-border
        rounded-xl
        overflow-hidden
    "
>
    <div
        class="
            flex
            items-center
            gap-2
            px-4
            py-3
            border-b
            border-card-border
            bg-surface
        "
    >
        <span class="material-icons-outlined icon-md">
            {{ $icon }}
        </span>

        <h4 class="font-semibold">
            {{ $title }}
        </h4>
    </div>

    <div class="p-4">
        {{ $slot }}
    </div>
</div>
