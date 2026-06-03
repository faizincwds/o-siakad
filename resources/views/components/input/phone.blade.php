@props([
    'name',
    'value' => null,
    'label' => null,
    'required' => false,
    'icon' => null,
    'helper' => null,
])

<div class="space-y-1.5">
    @if($label)
        <label
            for="{{ $name }}"
            class="block text-sm font-medium text-foreground"
        >
            {{ $label }}

            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

  <div class="relative">
        @if($icon)
            <span
                class="material-icons-outlined icon-md absolute left-3 top-1/2 -translate-y-1/2 text-muted"
            >
                {{ $icon }}
            </span>
        @endif
    <input
        type="tel"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="08xxxxxxxxxx"
        pattern="[0-9]+"
        {{ $required ? 'required' : '' }}
        {{
            $attributes->merge([
                    'class' =>
                    'w-full rounded-lg border border-card-border text-foreground
                    focus:border-brand-300 focus:ring-1 focus:ring-brand-100
                    outline-none transition-all
                    py-2.5 text-sm ' .
                    ($icon ? 'pl-10 pr-4' : 'px-4')
                ])
        }}
    >
  </div>

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
