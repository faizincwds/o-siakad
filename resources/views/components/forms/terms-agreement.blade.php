@props([
    'name' => 'terms',
    'required' => true,
    'termsUrl' => '#',
    'privacyUrl' => '#',
])

<div>
    <label class="flex items-start gap-2 cursor-pointer select-none">
        <input
            type="checkbox"
            name="{{ $name }}"
            value="1"
            {{ old($name) ? 'checked' : '' }}
            @if($required) required @endif
            class="mt-0.5 h-4 w-4 rounded border-card-border text-brand-600 focus:ring-brand-500 bg-surface/50"
        >
        <span class="text-xs text-muted leading-relaxed">
            I agree to the
            <a
                href="{{ $termsUrl }}"
                target="_blank"
                class="font-semibold text-brand-600 hover:underline dark:text-brand-400"
            >
                Terms & Conditions
            </a>

            @if($privacyUrl)
                and
                <a
                    href="{{ $privacyUrl }}"
                    target="_blank"
                    class="font-semibold text-brand-600 hover:underline dark:text-brand-400"
                >
                    Privacy Policy
                </a>
            @endif
        </span>
    </label>

    {{-- OPTIMASI FIX BARIS 42: Menggunakan ekstraksi error bag yang aman dari isolated scope --}}
    @php
        $errorsBag = session()->get('errors') ?? view()->shared('errors');
        $hasError = $errorsBag && $errorsBag->has($name);
    @endphp

    @if($hasError)
        <p class="mt-1 text-xs text-red-500">
            {{ $errorsBag->first($name) }}
        </p>
    @endif
</div>
