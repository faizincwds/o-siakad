<div class="flex items-center justify-between">
    <label class="flex items-center cursor-pointer">
        <input
            type="checkbox"
            name="{{ $name }}"
            value="1"
            {{ old($name) ? 'checked' : '' }}
            class="h-4 w-4 rounded border-card-border dark:text-brand-600 focus:ring-brand-500"
            required=""
        >

        <span for="{{ $name }}" class="ml-2 text-sm text-muted block">
            {{ $label }}
        </span>
    </label>

    @if(Route::has('password.request'))
        <a
            href="{{ Route::has('password.request') ? route('password.request') : '#' }}"
            class="text-sm text-brand-600 hover:underline dark:text-brand-400"
        >
            Forgot password?
        </a>
    @endif
</div>
