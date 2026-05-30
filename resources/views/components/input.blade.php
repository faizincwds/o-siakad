@props(['name', 'type' => 'text', 'label', 'placeholder' => '', 'value' => '', 'required' => false])

<div>
    <!-- Label disesuaikan dengan desain Anda -->
    <label for="{{ $name }}" class="text-[11px] font-semibold text-muted block mb-1">
        {{ $label }}
    </label>

    <!-- Input disesuaikan dengan desain Anda, dan menggunakan $attributes->merge agar bisa menerima class tambahan (seperti readonly) -->
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ old($name, $value) }}"
        required="{{ $required ? 'required' : '' }}"
        {{
            $attributes->merge([
                'class' => 'w-full px-3 py-2 text-[12.5px] text-muted border border-card-border rounded-lg bg-surface focus:border-brand-300 focus:ring-1 focus:ring-brand-100 outline-none transition-all'
            ])
        }}
    >

    <!-- Error message disesuaikan ukurannya -->
    @error($name)
        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
