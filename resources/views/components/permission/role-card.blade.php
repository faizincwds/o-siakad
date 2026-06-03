@props([
    'name' => '',
    'icon' => 'shield',
    'active' => false,
    'description' => null,
])

<button
    type="button"
    {{
        $attributes->merge([
            'class' => '
                w-full
                flex items-start gap-3
                p-4
                rounded-xl
                border
                transition-all
                text-left
            '.(
                $active
                ? 'bg-brand-500 text-white border-brand-500 shadow-sm'
                : 'bg-card border-card-border hover:bg-surface'
            )
        ])
    }}
>
    <span class="material-icons-outlined icon-lg">
        {{ $icon }}
    </span>

    <div class="flex-1">
        <div class="font-semibold">
            {{ $name }}
        </div>

        @if($description)
            <div class="text-xs opacity-80 mt-1">
                {{ $description }}
            </div>
        @endif
    </div>
</button>
