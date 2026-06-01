@props([
    'name',
    'placeholder' => 'Cari...',
    'value' => ''
])

<div class="relative">
    <span class="material-icons-outlined absolute left-3 top-1/2 -translate-y-1/2 text-muted icon-md">
        search
    </span>

    <input
        type="search"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => '
                w-full rounded-lg
                border border-card-border
                bg-surface
                py-2.5 pl-10 pr-4
                text-sm text-foreground
                focus:border-brand-500
                focus:ring-2 focus:ring-brand-500/20
            '
        ]) }}
    >
</div>