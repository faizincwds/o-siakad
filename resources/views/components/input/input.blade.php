@props([
    'label' => null,
    'name',
    'type' => 'text',
    'placeholder' => '',
    'required' => false,
    'icon' => null,
    'helper' => null,
    'readonly' => false,
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

          @php
             $baseClass = 'w-full rounded-md border border-card-border text-foreground
                           focus:border-brand-300 focus:ring-1 focus:ring-brand-50
                           outline-none transition-all py-2.5 text-sm';
             $paddingClass = $icon ? 'pl-10 pr-4' : 'px-4';
             $stateClass = $readonly ? 'bg-gray-100 dark:bg-gray-800 cursor-not-allowed' : '';
             $inputClass = trim("$baseClass $paddingClass $stateClass");
          @endphp

        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            {{ $readonly ? 'readonly' : '' }}
            {{ $attributes->merge(['class' => $inputClass]) }}
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
