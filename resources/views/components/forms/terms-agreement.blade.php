@props([
    'name' => 'terms',
    'required' => true,
    'termsUrl' => '#',
    'privacyUrl' => '#',
])

<div>

    <label class="flex items-start gap-2 cursor-pointer">
        <input
            type="checkbox"
            name="{{ $name }}"
            value="1"
            {{ old($name) ? 'checked' : '' }}
            @if($required) required @endif
            class="mt-0.5 h-4 w-4 rounded border-card-border text-brand-600 focus:ring-brand-500"
        >
        <span class="text-sm text-muted leading-relaxed">
            I agree to the
            <a
                href="{{ $termsUrl }}"
                target="_blank"
                class="font-medium text-brand-600 hover:underline dark:text-brand-400"
            >
                Terms & Conditions
            </a>

            @if($privacyUrl)
                and
                <a
                    href="{{ $privacyUrl }}"
                    target="_blank"
                    class="font-medium text-brand-600 hover:underline dark:text-brand-400"
                >
                    Privacy Policy
                </a>
            @endif
        </span>
    </label>

    @error($name)
        <p class="mt-2 text-xs text-red-500">
            {{ $message }}
        </p>
    @enderror

</div>
