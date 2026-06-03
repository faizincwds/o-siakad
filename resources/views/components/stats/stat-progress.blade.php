@props([
    'title' => '',
    'value' => 0,
])

<div>

    <div class="flex justify-between mb-2">

        <span class="text-sm">
            {{ $title }}
        </span>

        <span class="font-medium">
            {{ $value }}%
        </span>

    </div>

    <div
        class="
            h-2
            bg-surface
            rounded-full
            overflow-hidden
        "
    >
        <div
            class="h-full bg-brand-500"
            style="width:{{ $value }}%"
        ></div>
    </div>

</div>
