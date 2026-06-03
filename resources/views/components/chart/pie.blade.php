@props([
    'title' => null,
    'height' => 350,
    'series' => [],
    'labels' => [],
])

<div
    x-data
    x-init="
        new ApexCharts($refs.chart,{
            chart:{
                type:'pie',
                height:{{ $height }}
            },
            labels:@js($labels),
            series:@js($series)
        }).render()
    "
    class="bg-card border border-card-border rounded-xl p-5"
>

    @if($title)
        <h3 class="font-semibold mb-4">
            {{ $title }}
        </h3>
    @endif

    <div x-ref="chart"></div>

</div>
