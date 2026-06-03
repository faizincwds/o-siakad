@props([
    'semester' => '',
    'ips' => '0.00',
    'sks' => 0,
])

<div class="bg-card border border-card-border rounded-xl p-5">

    <h3 class="font-semibold flex items-center gap-2 mb-4">
        <span class="material-icons-outlined">grade</span>
        Kartu Hasil Studi
    </h3>

    <div class="grid grid-cols-3 gap-4">

        <div>
            <div class="text-xs text-muted">
                Semester
            </div>

            <div class="font-semibold">
                {{ $semester }}
            </div>
        </div>

        <div>
            <div class="text-xs text-muted">
                IPS
            </div>

            <div class="font-semibold text-brand-600">
                {{ $ips }}
            </div>
        </div>

        <div>
            <div class="text-xs text-muted">
                SKS
            </div>

            <div class="font-semibold">
                {{ $sks }}
            </div>
        </div>

    </div>

    <div class="mt-4">
        {{ $slot }}
    </div>

</div>
