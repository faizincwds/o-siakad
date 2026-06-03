@props([
    'show' => 'confirmModal',
    'title' => 'Konfirmasi',
    'message' => 'Apakah Anda yakin ingin melanjutkan?',
    'confirmText' => 'Ya, Lanjutkan',
    'cancelText' => 'Batal',
    'confirmIcon' => 'check_circle',
    'variant' => 'danger',
])

@php

$variants = [
    'danger' => [
        'icon' => 'delete',
        'iconClass' => 'bg-red-100 text-red-600 dark:bg-red-500/10 dark:text-red-400',
        'button' => 'danger',
    ],

    'warning' => [
        'icon' => 'warning',
        'iconClass' => 'bg-amber-100 text-amber-600 dark:bg-amber-500/10 dark:text-amber-400',
        'button' => 'warning',
    ],

    'success' => [
        'icon' => 'check_circle',
        'iconClass' => 'bg-green-100 text-green-600 dark:bg-green-500/10 dark:text-green-400',
        'button' => 'success',
    ],

    'info' => [
        'icon' => 'info',
        'iconClass' => 'bg-blue-100 text-blue-600 dark:bg-blue-500/10 dark:text-blue-400',
        'button' => 'primary',
    ],
];

$config = $variants[$variant] ?? $variants['danger'];

@endphp

<div
    x-show="{{ $show }}"
    x-cloak
    x-transition.opacity
    class="fixed inset-0 z-9999"
>

    {{-- Backdrop --}}
    <div
        class="absolute inset-0 bg-black/50 backdrop-blur-[2px]"
        @click="{{ $show }} = false"
    ></div>

    {{-- Dialog --}}
    <div
        class="absolute inset-0 flex items-center justify-center p-4"
    >

        <div
            @click.stop
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="
                w-full
                max-w-md
                bg-card
                border border-card-border
                rounded-xl
                shadow-2xl
                overflow-hidden
            "
        >

            {{-- Body --}}
            <div class="p-6 text-center">

                <div
                    class="
                        w-16 h-16 mx-auto mb-4
                        rounded-full
                        flex items-center justify-center
                        {{ $config['iconClass'] }}
                    "
                >
                    <span class="material-icons-outlined text-[32px]">
                        {{ $config['icon'] }}
                    </span>
                </div>

                <h3
                    class="
                        text-lg
                        font-semibold
                        text-foreground
                        mb-2
                    "
                >
                    {{ $title }}
                </h3>

                <p
                    class="
                        text-sm
                        text-muted
                        leading-relaxed
                    "
                >
                    {{ $message }}
                </p>

            </div>

            {{-- Footer --}}
            <div
                class="
                    px-6 py-4
                    border-t border-card-border
                    flex items-center justify-center gap-2
                "
            >

                <x-button.button
                    variant="ghost"
                    @click="{{ $show }} = false"
                >
                    {{ $cancelText }}
                </x-button.button>

                <button
                    type="button"
                    {{
                        $attributes->merge([
                            'class' => ''
                        ])
                    }}
                >
                    <x-button.button
                        :variant="$config['button']"
                        :icon="$confirmIcon"
                    >
                        {{ $confirmText }}
                    </x-button.button>
                </button>

            </div>

        </div>

    </div>

</div>
