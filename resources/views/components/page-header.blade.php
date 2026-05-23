@props(['breadcrumbs', 'title', 'description', 'icon'])

<div class="pg-hd">
    {{-- Breadcrumbs --}}
    <div class="bc">
        @foreach($breadcrumbs as $idx => $crumb)
            @if($idx < count($breadcrumbs) - 1)
                <a href="{{ $crumb['url'] ?? '#' }}" class="bc-l">{{ $crumb['label'] ?? $crumb }}</a>
                <span class="material-icons-outlined bc-sep">chevron_right</span>
            @else
                <span class="bc-c">{{ $crumb['label'] ?? $crumb }}</span>
            @endif
        @endforeach
    </div>

    {{-- Page Header --}}
    <div class="pg-tl">
        <div class="pg-ico">
            <span class="material-icons-outlined">{{ $icon }}</span>
        </div>
        <div>
            <h1 class="pg-t">{{ $title }}</h1>
            <p class="pg-d">{{ $description }}</p>
        </div>
    </div>
</div>
