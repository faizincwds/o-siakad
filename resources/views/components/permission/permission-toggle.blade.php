@props([
    'checked' => false,
    'name' => '',
])

<label class="inline-flex items-center justify-center">
    <input
        type="checkbox"
        name="{{ $name }}"
        @checked($checked)
        class="
            h-4 w-4
            rounded
            border-card-border
            text-brand-600
            focus:ring-brand-500
        "
    >
</label>
