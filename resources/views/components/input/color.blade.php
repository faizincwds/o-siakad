@props([
    'name',
    'label' => null,
    'value' => '#10b981',
])

<div>

    @if($label)
        <label
            class="block mb-2 text-sm font-medium text-foreground"
        >
            {{ $label }}
        </label>
    @endif

    <div
        class="flex items-center gap-3"
        x-data="{ color:'{{ $value }}' }"
    >

        <input
            type="color"
            name="{{ $name }}"
            x-model="color"
            class="
                h-12 w-16
                cursor-pointer
                rounded-lg
                border border-card-border
            "
        >

        <input
            type="text"
            x-model="color"
            class="
                flex-1
                rounded-lg
                border border-card-border
                bg-card
                px-4 py-3
            "
        >

    </div>

</div>
