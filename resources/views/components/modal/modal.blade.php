@props([
    'show' => 'openModal',
    'title' => null,
    'size' => 'md',
    'closable' => true,
])

@php

$sizes = [
    'sm' => 'max-w-md',
    'md' => 'max-w-2xl',
    'lg' => 'max-w-4xl',
    'xl' => 'max-w-6xl',
    'full' => 'max-w-[95vw]',
];

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
        @if($closable)
            @click="{{ $show }} = false"
        @endif
    ></div>

    {{-- Modal Wrapper --}}
    <div
        class="absolute inset-0 flex items-center justify-center p-4 overflow-y-auto"
    >

        {{-- Modal --}}
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
                {{ $sizes[$size] ?? $sizes['md'] }}
                bg-card
                border
                border-card-border
                rounded-xl
                shadow-2xl
                overflow-hidden
            "
        >

            {{-- Header --}}
            @if($title)

                <div
                    class="
                        flex items-center justify-between
                        px-5 py-4
                        border-b border-card-border
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
                                cursor-pointer
                                flex items-center justify-center
                                hover:bg-surface
                                transition-colors
                            "
                        >
                            <span class="material-icons-outlined text-muted">
                                close
                            </span>
                        </button>

                    @endif

                </div>

            @endif

            {{-- Body --}}
            <div class="p-5">

                {{ $slot }}

            </div>

            {{-- Footer --}}
            @isset($footer)

                <div
                    class="
                        px-5 py-4
                        border-t border-card-border
                        bg-surface/50
                        flex items-center justify-end gap-2
                    "
                >
                    {{ $footer }}
                </div>

            @endisset

        </div>

    </div>

</div>
