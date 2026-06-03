@props([
    'status' => 'connected'
])

<div class="bg-card border border-card-border rounded-xl p-5">

    <div class="flex items-center justify-between">

        <div>

            <h3 class="font-semibold">
                Neo Feeder
            </h3>

            <div class="text-sm text-muted">
                Status Integrasi
            </div>

        </div>

        @if($status === 'connected')

            <span
                class="px-3 py-1 rounded-full text-xs bg-green-100 text-green-600"
            >
                Connected
            </span>

        @else

            <span
                class="px-3 py-1 rounded-full text-xs bg-red-100 text-red-600"
            >
                Disconnected
            </span>

        @endif

    </div>

</div>
