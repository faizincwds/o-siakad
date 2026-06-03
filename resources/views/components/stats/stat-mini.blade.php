@props([
    'title' => '',
    'value' => '',
    'icon' => 'analytics',
])

<div
    class="
        flex
        items-center
        gap-3
        p-4
        rounded-xl
        border
        border-card-border
        bg-card
    "
>

    <div
        class="
            w-10 h-10
            rounded-lg
            bg-brand-50
            flex
            items-center
            justify-center
            text-brand-600
        "
    >
        <span class="material-icons-outlined">
            {{ $icon }}
        </span>
    </div>

    <div>
        <div class="text-xs text-muted">
            {{ $title }}
        </div>

        <div class="font-semibold">
            {{ $value }}
        </div>
    </div>

</div>
