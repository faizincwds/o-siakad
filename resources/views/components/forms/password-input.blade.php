@props([
    'name' => 'password',
    'label' => 'Password',
    'icon' => 'lock',
    'required' => true,
    'showGenerator' => false,
    'showCopy' => false,
])

<div class="space-y-1.5">

    <div class="flex items-center justify-between">

        <label class="text-sm font-medium text-foreground">

            {{ $label }}

            @if($required)
                <span class="text-red-500">*</span>
            @endif

        </label>

        @if($showGenerator)

            <button
                type="button"
                @click="generatePassword()"
                class="text-xs text-brand-600"
            >
                Generate
            </button>

        @endif

    </div>

    <div class="relative">

        <span
            class="material-icons-outlined absolute left-3 top-1/2 -translate-y-1/2 text-muted"
        >
            {{ $icon }}
        </span>

        <input
            :type="visible ? 'text':'password'"
            id="{{ $name }}"
            name="{{ $name }}"
            x-model="password"
            class="w-full pl-10 pr-24 py-2.5 rounded-md border border-card-border bg-surface text-sm"
        >

        <div
            class="absolute right-3 top-1/2 -translate-y-1/2 flex items-center gap-2"
        >

            @if($showCopy)

                <button
                    type="button"
                    @click="copyPassword()"
                >
                    <span class="material-icons-outlined">
                        content_copy
                    </span>
                </button>

            @endif

            <button
                type="button"
                @click="visible=!visible"
            >

                <span
                    x-show="!visible"
                    class="material-icons-outlined"
                >
                    visibility
                </span>

                <span
                    x-show="visible"
                    class="material-icons-outlined"
                >
                    visibility_off
                </span>

            </button>

        </div>

    </div>

    @error($name)
        <p class="text-xs text-red-500">
            {{ $message }}
        </p>
    @enderror

</div>
