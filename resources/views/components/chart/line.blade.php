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
                type:'line',
                height:{{ $height }},
                toolbar:{show:false},
                fontFamily:'Plus Jakarta Sans'
            },
            stroke:{
                curve:'smooth',
                width:3
            },
            series:@js($series),
            xaxis:{
                categories:@js($categories)
            },
            grid:{
                borderColor:'#e5e7eb'
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
