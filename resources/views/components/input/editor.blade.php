@props([
    'name',
    'label' => null,
    'value' => '',
])

<div>

    @if($label)

        <label
            class="block mb-2 text-sm font-medium text-foreground"
        >
            {{ $label }}
        </label>

    @endif

    <input
        id="{{ $name }}"
        type="hidden"
        name="{{ $name }}"
        value="{{ $value }}"
    >

    <trix-editor
        input="{{ $name }}"
        class="
            bg-card
            border border-card-border
            rounded-lg
            min-h-62.5
        "
    ></trix-editor>

</div>
