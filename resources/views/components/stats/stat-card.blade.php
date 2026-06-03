@props([
    'title' => '',
    'value' => '',
])

<div
    class="
        bg-card
        border border-card-border
        rounded-xl
        p-5
    "
>
    <div class="flex items-start justify-between">

        <div>
            <div class="text-sm text-muted">
                {{ $title }}
            </div>

            <div class="text-2xl font-bold mt-2">
                {{ $value }}
            </div>
        </div>

        {{ $icon ?? '' }}

    </div>

    @isset($footer)
        <div class="mt-4">
            {{ $footer }}
        </div>
    @endisset
</div>
