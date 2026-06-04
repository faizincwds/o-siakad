@props([
    'name',
    'label' => null,
    'value' => null,
    'placeholder' => 'Masukkan password',
    'required' => false,
    'icon' => 'lock',
    'helper' => null,

    'showToggle' => true,
    'showCopy' => false,
])

<div
    x-data="{
        visible:false,
        password:'{{ old($name, $value) }}',
        capslock:false,

    }"
    class="space-y-1.5"
>

    {{-- Label --}}
    @if($label)

        <div class="flex items-center justify-between">

            <label
                for="{{ $name }}"
                class="text-sm font-medium text-foreground"
            >
                {{ $label }}

                @if($required)
                    <span class="text-red-500">*</span>
                @endif
            </label>

        </div>

    @endif

    {{-- Input --}}
    <div class="relative">

        {{-- Icon --}}
        @if($icon)

            <span
                class="material-icons-outlined icon-md absolute left-3 top-1/2 -translate-y-1/2 text-muted"
            >
                {{ $icon }}
            </span>

        @endif

        <input
            :type="visible ? 'text' : 'password'"
            id="{{ $name }}"
            name="{{ $name }}"
            x-model="password"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}

            {{
                $attributes->merge([
                    'class' =>
                    'w-full rounded-lg border border-card-border
                    bg-surface text-foreground
                    focus:border-brand-300
                    focus:ring-1 focus:ring-brand-100
                    outline-none transition-all
                    py-2.5 text-sm ' .
                    ($icon ? 'pl-10 pr-24' : 'px-4')
                ])
            }}
        >

        {{-- Action Buttons --}}
        <div
            class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-2"
        >

            @if($showCopy)

                <button
                    type="button"
                    @click="copyPassword()"
                    class="text-muted hover:text-brand-600 transition-colors"
                    title="Salin Password"
                >
                    <span class="material-icons-outlined text-[18px]">
                        content_copy
                    </span>
                </button>

            @endif

            @if($showToggle)

                <button
                    type="button"
                    @click="visible = !visible"
                    class="text-muted hover:text-brand-600 transition-colors"
                    title="Tampilkan Password"
                >

                    <span
                        x-show="!visible"
                        class="material-icons-outlined text-[18px]"
                    >
                        visibility
                    </span>

                    <span
                        x-show="visible"
                        x-cloak
                        class="material-icons-outlined text-[18px]"
                    >
                        visibility_off
                    </span>

                </button>

            @endif

        </div>

    </div>

    {{-- Caps Lock Warning --}}
    <div
        x-show="capslock"
        x-transition
        x-cloak
        class="flex items-center gap-2 rounded-lg
        border border-yellow-200
        bg-yellow-50
        px-3 py-2
        text-xs text-yellow-700"
    >
        <span class="material-icons-outlined text-sm">
            warning
        </span>

        Caps Lock aktif
    </div>

    {{-- Helper --}}
    @if($helper)

        <p class="text-xs text-muted">
            {{ $helper }}
        </p>

    @endif

    {{-- Error --}}
    @error($name)

        <p class="text-xs text-red-500">
            {{ $message }}
        </p>

    @enderror

</div>
