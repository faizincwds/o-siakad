<div
    x-show="password.length > 0"
    x-cloak
>

    <div
        class="flex items-center justify-between text-xs mb-2"
    >
        <span>Password Strength</span>

        <span x-text="strengthLabel"></span>
    </div>

    <div
        class="h-2 rounded-full bg-surface overflow-hidden"
    >
        <div
            class="h-full transition-all duration-500"
            :style="`
                width:${strengthWidth}%;
                background:${strengthColor}
            `"
        ></div>
    </div>

    <div class="mt-3 space-y-1 text-xs">

        <div :class="hasMinLength ? 'text-green-500':'text-muted'">
            ✓ Minimal 8 karakter
        </div>

        <div :class="hasUppercase ? 'text-green-500':'text-muted'">
            ✓ Huruf besar
        </div>

        <div :class="hasLowercase ? 'text-green-500':'text-muted'">
            ✓ Huruf kecil
        </div>

        <div :class="hasNumber ? 'text-green-500':'text-muted'">
            ✓ Angka
        </div>

        <div :class="hasSymbol ? 'text-green-500':'text-muted'">
            ✓ Simbol
        </div>

    </div>

</div>
