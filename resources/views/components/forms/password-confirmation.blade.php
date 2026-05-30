@props([
    'label' => 'Confirm Password',
    'required' => true,
])

<div>

    <label class="text-[11px] font-semibold text-muted block mb-1">

        {{ $label }}

        @if($required)
            <span class="text-red-500">*</span>
        @endif

    </label>

    <div class="relative">

        <input
            :type="showConfirmPassword ? 'text' : 'password'"
            name="password_confirmation"
            x-model="confirmPassword"
            placeholder="Confirm your password"
            {{ $required ? 'required' : '' }}
            class="w-full px-3 py-2 text-[12.5px] text-muted border border-card-border rounded-lg bg-surface focus:border-brand-300 focus:ring-1 focus:ring-brand-100 outline-none transition-all"
        >

        <button
            type="button"
            @click="showConfirmPassword = !showConfirmPassword"
            class="absolute right-3 top-2.5 text-muted hover:text-brand-600"
        >
            <span
                x-show="!showConfirmPassword"
                x-cloak
                class="material-icons-outlined text-md"
            >
                visibility
            </span>

            <span
                x-show="showConfirmPassword"
                x-cloak
                class="material-icons-outlined text-md"
            >
                visibility_off
            </span>
        </button>

    </div>

    <div
        x-show="confirmPassword.length > 0 && !passwordMatch"
        x-transition
        class="mt-1 flex items-center gap-2 rounded-lg border border-red-100 bg-red-50 dark:bg-red-900/20 dark:border-red-400 dark:text-red-400 px-3 py-2 text-sm text-red-600"
    >
        <span class="material-icons-outlined text-sm">
            cancel
        </span>

        <span class="text-[11px]">
            Passwords do not match
        </span>
    </div>

</div>
