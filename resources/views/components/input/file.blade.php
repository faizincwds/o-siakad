@props([
    'name',
    'label' => null,
])

    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
            {{ $label }}
        </label>
    @endif

    <input
        type="file"
    name="{{ $name }}"
    {{
        $attributes->merge([
            'class' => '
                block w-full text-sm
                file:mr-4
                file:rounded-md
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
