@props([
    'url'
])

<div
    x-data="{
        search:'',
        results:[]
    }"
>

<input
    type="text"
    x-model="search"
    @input.debounce.500ms="
        fetch('{{ $url }}?q='+search)
            .then(res => res.json())
            .then(data => results = data)
    "
    class="w-full rounded-lg border border-card-border px-4 py-2.5"
>

<div
    class="mt-2 rounded-lg border border-card-border"
    x-show="results.length"
>
    <template x-for="item in results">

        <div
            class="cursor-pointer px-4 py-2 hover:bg-surface"
            x-text="item.text"
        ></div>

    </template>
</div>

</div>