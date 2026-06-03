@props([
    'title' => null,
    'height' => 320,
    'series' => [],
    'categories' => [],
])

<div
    x-data
    x-init="
        new ApexCharts($refs.chart,{
            chart:{
                type:'area',
                height:{{ $height }},
                toolbar:{show:false}
            },
            dataLabels:{enabled:false},
            stroke:{
                curve:'smooth'
            },
            series:@js($series),
            xaxis:{
                categories:@js($categories)
            }
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
