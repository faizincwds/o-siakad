<th
    {{
        $attributes->merge([
            'class' => '
                px-4 py-3
                text-left
                font-semibold
                bg-surface
                border-b border-card-border
                whitespace-nowrap
            '
        ])
    }}
>
    {{ $slot }}
</th>
