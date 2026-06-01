@props([
    'label' => null,
    'name',
    'rows' => 4,
    'required' => false,
    'helper' => null,
])

<div class="space-y-1.5">

    @if($label)
        <label class="block text-sm font-medium text-foreground">
            {{ $label }}

            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <textarea
        name="{{ $name }}"
        rows="{{ $rows }}"
        {{ $required ? 'required' : '' }}

        {{
            $attributes->merge([
                'class' =>
                'w-full rounded-lg border border-card-border bg-surface
                px-4 py-3 text-sm text-foreground
                outline-none transition-all
                focus:border-brand-300 focus:ring-1 focus:ring-brand-100'
            ])
        }}
    >{{ $slot }}</textarea>

    @if($helper)
        <p class="text-xs text-muted">
            {{ $helper }}
        </p>
    @endif

    @error($name)
        <p class="text-xs text-red-500">
            {{ $message }}
        </p>
    @enderror

</div>