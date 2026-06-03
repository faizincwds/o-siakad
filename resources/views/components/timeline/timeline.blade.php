@props([
    'title' => null,
    'icon' => 'history',
])

<div
    {{ $attributes->merge([
        'class' => 'bg-card border border-card-border rounded-xl'
    ]) }}
>

    @if($title)

        <div
            class="flex items-center gap-2 p-5 border-b border-card-border"
        >

            <span
                class="material-icons-outlined icon-md text-brand-600"
            >
                {{ $icon }}
            </span>

            <h3
                class="font-semibold text-foreground"
            >
                {{ $title }}
            </h3>

        </div>

    @endif

    <div class="p-5">

        <div class="relative">

            {{ $slot }}

        </div>

    </div>

</div>
