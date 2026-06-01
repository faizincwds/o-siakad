@props([
    'name',
    'label',
])

<label class="flex items-center gap-3 cursor-pointer">

    <input
        type="checkbox"
        name="{{ $name }}"
        {{
            $attributes->merge([
                'class' =>
                'h-4 w-4 rounded border-card-border
                text-brand-600 focus:ring-brand-500'
            ])
        }}
    >

    <span class="text-sm text-foreground">
        {{ $label }}
    </span>

</label>