@props([
    'name' => 'password',
    'label' => 'Password',
    'required' => true,
    'showGenerator' => true,
])

<div>
    <div class="mb-2.5 flex items-center justify-between">

        <label for="{{ $name }}" class="text-[11px] font-semibold text-muted block mb-1">
            {{ $label }}

            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>

        @if($showGenerator)
            <button
                type="button"
                @click="generatePassword()"
                class="text-xs font-medium text-brand-600 hover:underline"
            >
                Generate Password
            </button>
        @endif

    </div>

    <div class="relative">

        <input
            :type="showPassword ? 'text' : 'password'"
            name="{{ $name }}"
            x-model="password"
            @keydown.window="capslock = $event.getModifierState('CapsLock')"
            placeholder="Enter your password"
            {{ $required ? 'required' : '' }}
            class="w-full px-3 py-2 text-[12.5px] text-muted border border-card-border rounded-lg bg-surface focus:border-brand-300 focus:ring-1 focus:ring-brand-100 outline-none transition-all"
        >

        <div class="absolute right-3 top-2.5 flex items-center gap-2">

            <button
                type="button"
                @click="copyPassword()"
                class="text-muted hover:text-brand-600"
                title="Copy Password"
            >
                <span class="material-icons-outlined text-md">
                    content_copy
                </span>
            </button>

            <button
                type="button"
                @click="showPassword = !showPassword"
                class="text-muted hover:text-brand-600"
            >
                <span
                    x-show="!showPassword"
                    x-cloak
                    class="material-icons-outlined text-md"
                >
                    visibility
                </span>

                <span
                    x-show="showPassword"
                    x-cloak
                    class="material-icons-outlined text-md"
                >
                    visibility_off
                </span>
            </button>

        </div>

    </div>

    <div
        x-show="capslock"
        x-transition
        class="mt-2 flex items-center gap-2 rounded-lg border border-yellow-200 bg-yellow-50 px-3 py-2 text-sm text-yellow-700"
    >
        <span class="material-icons-outlined text-sm">
            warning
        </span>

        <span>Caps Lock is on</span>
    </div>

    @error($name)
        <p class="mt-1.5 text-xs text-red-500">
            {{ $message }}
        </p>
    @enderror

</div>
