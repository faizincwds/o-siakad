@props([
    'options' => []
])

<div x-data="{
    open:false,
    search:'',
}">

    <input
        type="text"
        x-model="search"
        @focus="open=true"
        placeholder="Cari..."
        class="w-full rounded-lg border border-card-border px-4 py-2.5"
    >

    <div
        x-show="open"
        @click.outside="open=false"
        class="mt-2 rounded-lg border border-card-border bg-card"
    >

        @foreach($options as $value => $label)

            <div
                x-show="'{{ strtolower($label) }}'.includes(search.toLowerCase())"
                class="cursor-pointer px-4 py-2 hover:bg-surface"
            >
                {{ $label }}
            </div>

        @endforeach

    </div>

</div>