@props([
    'icon' => 'analytics'
])

<div
    class="
        w-12 h-12
        rounded-xl
        bg-brand-50
        text-brand-600
        flex
        items-center
        justify-center
    "
>
    <span class="material-icons-outlined">
        {{ $icon }}
    </span>
</div>
