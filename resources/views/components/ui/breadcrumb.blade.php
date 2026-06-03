@props([
    'items' => []
])

<nav class="flex items-center gap-2 text-sm">

@foreach($items as $item)

    @if(!$loop->first)
        <span>/</span>
    @endif

    <span>
        {{ $item }}
    </span>

@endforeach

</nav>
