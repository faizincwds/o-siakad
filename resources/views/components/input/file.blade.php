@props([
    'name'
])

<input
    type="file"
    name="{{ $name }}"
    {{
        $attributes->merge([
            'class' => '
                block w-full text-sm
                file:mr-4
                file:rounded-lg
                file:border-0
                file:bg-brand-600
                file:px-4
                file:py-2
                file:text-white
                hover:file:bg-brand-700
            '
        ])
    }}
>