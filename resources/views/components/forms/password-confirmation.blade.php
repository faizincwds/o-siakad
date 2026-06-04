<div class="space-y-1.5">

    <label class="text-sm font-medium text-foreground">
        Konfirmasi Password
    </label>

    <div class="relative">

        <input
            :type="visibleConfirm ? 'text':'password'"
            x-model="confirmPassword"
            id="password_confirmation"
            name="password_confirmation"
            class="w-full pr-12 px-4 py-2.5 rounded-lg border border-card-border bg-surface text-sm"
        >

        <button
            type="button"
            @click="visibleConfirm=!visibleConfirm"
            class="absolute right-3 top-1/2 -translate-y-1/2"
        >
            <span
                x-show="!visibleConfirm"
                class="material-icons-outlined"
            >
                visibility
            </span>

            <span
                x-show="visibleConfirm"
                class="material-icons-outlined"
            >
                visibility_off
            </span>
        </button>

    </div>

    <div
        x-show="confirmPassword.length > 0 && !passwordMatch"
        class="text-xs text-red-500"
    >
        Password tidak sama
    </div>

</div>
