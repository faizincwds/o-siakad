<div
    {{
        $attributes->merge([
            'class' => 'bg-card border border-card-border rounded-xl p-5'
        ])
    }}
>
    {{ $slot }}
</div>
