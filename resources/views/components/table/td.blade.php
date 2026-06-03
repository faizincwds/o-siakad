<td
    {{
        $attributes->merge([
            'class' => '
                px-4 py-3
                border-b
                border-card-border
            '
        ])
    }}
>
    {{ $slot }}
</td>
