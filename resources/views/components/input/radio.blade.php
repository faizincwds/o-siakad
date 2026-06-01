@props([
    'name',
    'label',
    'value'
])

<label class="flex items-center gap-3 cursor-pointer">

    <input
        type="radio"
        name="{{ $name }}"
        value="{{ $value }}"

        {{
            $attributes->merge([
                'class' =>
                'h-4 w-4 border-card-border
                text-brand-600 focus:ring-brand-500'
            ])
        }}
    >

    <span class="text-sm text-foreground">
        {{ $label }}
    </span>

</label>