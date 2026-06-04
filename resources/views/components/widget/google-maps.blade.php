@props([
    'query' => null,
    'embed' => null,
    'lat' => null,
    'lng' => null,

    'height' => '350px',

    'title' => 'Lokasi',
    'showButton' => false,
])

@php

$embedUrl = null;
$mapsUrl = null;

if ($lat && $lng) {

    $embedUrl = "https://maps.google.com/maps?q={$lat},{$lng}&z=15&output=embed";
    $mapsUrl  = "https://www.google.com/maps?q={$lat},{$lng}";

} elseif ($embed) {

    $embedUrl = $embed;
    $mapsUrl  = $embedUrl;

} elseif ($query) {

    $queryEncoded = urlencode($query);
    $embedUrl = "https://maps.google.com/maps?q={$queryEncoded}&z=15&output=embed";
    $mapsUrl  = "https://www.google.com/maps/search/?api=1&query={$queryEncoded}";

} else {
    // Default to a generic location (e.g., Jakarta)
    $embedUrl = "https://maps.google.com/maps?q=Jakarta&z=15&output=embed";
    $mapsUrl  = "https://www.google.com/maps/search/?api=1&query=Jakarta";
}

@endphp

<div
    {{ $attributes->merge([
        'class' => 'bg-card border border-card-border rounded-xl overflow-hidden'
    ]) }}
>

    <div class="px-5 py-4 border-b border-card-border">
        <div class="flex items-center justify-between">
            <h3 class="font-semibold flex items-center gap-2 text-md text-foreground">
                <span class="material-icons-outlined icon-md text-brand-600">
                    location_on
                </span>

                {{ $title }}

            </h3>

            @if($showButton)

                <a
                    href="{{ $mapsUrl }}"
                    target="_blank"
                    rel="noopener"
                    class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-brand-600 text-white text-sm hover:bg-brand-700"
                >
                    <span class="material-icons-outlined text-md">
                        map
                    </span>
                    Google Maps
                </a>

            @endif

        </div>
    </div>

    <div>
        <iframe
            src="{{ $embedUrl }}"
            width="100%"
            height="{{ $height }}"
            loading="lazy"
            allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            class="border-0"
        ></iframe>

    </div>

</div>
