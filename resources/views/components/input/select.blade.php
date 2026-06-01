@props([
    'label' => null,
    'name',
    'options' => [],
    'value' => null,
    'placeholder' => '-- Pilih --',
    'required' => false,
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

    <select
        name="{{ $name }}"
        {{
            $attributes->merge([
                'class' =>
                'w-full rounded-lg border border-card-border bg-surface
                px-4 py-2.5 text-sm text-foreground
                outline-none transition-all
                focus:border-brand-300 focus:ring-1 focus:ring-brand-100'
            ])
        }}
    >
        <option value="">
            {{ $placeholder }}
        </option>

        @foreach($options as $key => $text)

            <option
                value="{{ $key }}"
                @selected(old($name, $value) == $key)
            >
                {{ $text }}
            </option>

        @endforeach
    </select>

    @error($name)
        <p class="text-xs text-red-500">
            {{ $message }}
        </p>
    @enderror

</div>