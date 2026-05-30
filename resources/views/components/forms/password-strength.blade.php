<div x-show="password.length > 0" class="mt-4">

    <div class="mb-1 flex items-center justify-between text-[11px]">
        <span class="text-muted">
            Password Strength
        </span>

        <span
            x-text="strengthLabel"
            :class="strengthTextColor"
        ></span>
    </div>

    <div class="h-2 overflow-hidden rounded-full bg-surface">
        <div
            class="h-full rounded-full transition-all duration-500"
            :style="`width:${strengthWidth}%; background-color:${strengthColor}`"
        ></div>
    </div>

    <div class="mt-1 grid gap-1 text-[11px]">

        <template
            x-for="item in [
                { check: hasMinLength, label: 'At least 8 characters' },
                { check: hasUppercase, label: 'Contains uppercase letter' },
                { check: hasLowercase, label: 'Contains lowercase letter' },
                { check: hasNumber, label: 'Contains a number' },
                { check: hasSymbol, label: 'Contains a symbol' }
            ]"
            :key="item.label"
        >

            <div
                class="flex items-center gap-2"
                :class="item.check ? 'text-green-500' : 'text-muted'"
            >

                <span
                    x-show="item.check"
                    class="material-icons-outlined text-sm"
                >
                    check_circle
                </span>

                <span
                    x-show="!item.check"
                    class="material-icons-outlined text-sm"
                >
                    radio_button_unchecked
                </span>

                <span x-text="item.label"></span>

            </div>

        </template>

    </div>

</div>
