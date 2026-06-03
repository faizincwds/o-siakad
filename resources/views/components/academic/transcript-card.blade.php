@props([
    'ipk' => '0.00',
    'sks_lulus' => 0,
])

<div class="bg-card border border-card-border rounded-xl p-5">

    <h3 class="font-semibold flex items-center gap-2 mb-4">
        <span class="material-icons-outlined">workspace_premium</span>
        Transkrip Akademik
    </h3>

    <div class="grid grid-cols-2 gap-4">

        <div>
            <div class="text-xs text-muted">
                IPK
            </div>

            <div class="text-xl font-bold text-brand-600">
                {{ $ipk }}
            </div>
        </div>

        <div>
            <div class="text-xs text-muted">
                SKS Lulus
            </div>

            <div class="text-xl font-bold">
                {{ $sks_lulus }}
            </div>
        </div>

    </div>

    <div class="mt-4">
        {{ $slot }}
    </div>

</div>
