@props([
    'show' => 'drawerOpen',
    'title' => 'Drawer',
    'position' => 'right',
    'size' => 'md',
    'closable' => true,
])

@php

$positions = [
    'right' => [
        'wrapper' => 'justify-end',
        'enterStart' => 'translate-x-full',
        'leaveEnd' => 'translate-x-full',
    ],

    'left' => [
        'wrapper' => 'justify-start',
        'enterStart' => '-translate-x-full',
        'leaveEnd' => '-translate-x-full',
    ],
];

$sizes = [
    'sm' => 'w-80',
    'md' => 'w-96',
    'lg' => 'w-[32rem]',
    'xl' => 'w-[40rem]',
    'full' => 'w-full',
];

$config = $positions[$position] ?? $positions['right'];

@endphp

<div
    x-show="{{ $show }}"
    x-cloak
    class="fixed inset-0 z-9999"
>

    {{-- Backdrop --}}
    <div
        x-show="{{ $show }}"
        x-transition.opacity
        class="absolute inset-0 bg-black/40 backdrop-blur-[2px]"
        @if($closable)
            @click="{{ $show }} = false"
        @endif
    ></div>

    {{-- Drawer Wrapper --}}
    <div
        class="absolute inset-0 flex {{ $config['wrapper'] }}"
    >

        {{-- Drawer Panel --}}
        <div
            @click.stop
            x-show="{{ $show }}"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="{{ $config['enterStart'] }}"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="{{ $config['leaveEnd'] }}"
            class="
                h-full
                {{ $sizes[$size] ?? $sizes['md'] }}
                bg-card
                border-l border-card-border
                shadow-2xl
                flex flex-col
            "
        >

            {{-- Header --}}
            <div
                class="
                    flex items-center justify-between
                    px-5 py-4
                    border-b border-card-border
                    shrink-0
                "
            >

                <h3
                    class="
                        text-md
                        font-semibold
                        text-foreground
                        flex items-center gap-2
                    "
                >
                    {{ $title }}
                </h3>

                @if($closable)

                    <button
                        type="button"
                        @click="{{ $show }} = false"
                        class="
                            w-8 h-8
                            rounded-lg
                            flex items-center justify-center
                            hover:bg-surface
                            transition-colors
                            cursor-pointer
                        "
                    >
                        <span class="material-icons-outlined">
                            close
                        </span>
                    </button>

                @endif

            </div>

            {{-- Body --}}
            <div
                class="
                    flex-1
                    overflow-y-auto
                    p-5
                "
            >
                {{ $slot }}
            </div>

            {{-- Footer --}}
            @isset($footer)

                <div
                    class="
                        border-t border-card-border
                        p-4
                        bg-surface/50
                        shrink-0
                        flex items-center justify-end gap-2
                    "
                >
                    {{ $footer }}
                </div>

            @endisset

        </div>

    </div>

</div>
