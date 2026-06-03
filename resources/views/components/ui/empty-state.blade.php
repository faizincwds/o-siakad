@props([
    'title' => 'Data tidak ditemukan',
    'description' => null,
    'icon' => 'inbox'
])

<div
    class="text-center py-12"
>

    <x-ui.icon
        :name="$icon"
        size="xl"
        class="text-muted"
    />

    <h3
        class="mt-3 font-semibold"
    >
        {{ $title }}
    </h3>

    @if($description)

    <p class="text-muted mt-1">
        {{ $description }}
    </p>

    @endif

</div>
