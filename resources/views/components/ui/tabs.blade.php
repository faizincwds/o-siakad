@props([
    'tabs' => []
])

<div
    x-data="{
        tab:'{{ array_key_first($tabs) }}'
    }"
>

    <div class="flex gap-2 mb-4">

        @foreach($tabs as $key => $label)

        <button
            @click="tab='{{ $key }}'"
            :class="tab==='{{ $key }}'
            ? 'bg-brand-500 text-white'
            : ''"
            class="px-4 py-2 rounded-lg"
        >
            {{ $label }}
        </button>

        @endforeach

    </div>

    {{ $slot }}

</div>
