@props([
    'matkul' => '',
    'hadir' => 0,
    'izin' => 0,
    'sakit' => 0,
    'alpa' => 0,
])

<div class="bg-card border border-card-border rounded-xl p-5">

    <h3 class="font-semibold flex items-center gap-2 mb-4">
        <span class="material-icons-outlined">
            how_to_reg
        </span>

        {{ $matkul }}
    </h3>

    <div class="grid grid-cols-2 gap-3 text-sm">

        <div class="bg-green-50 rounded-lg p-3">
            <div class="text-xs text-muted">
                Hadir
            </div>

            <div class="font-bold text-green-600">
                {{ $hadir }}
            </div>
        </div>

        <div class="bg-blue-50 rounded-lg p-3">
            <div class="text-xs text-muted">
                Izin
            </div>

            <div class="font-bold text-blue-600">
                {{ $izin }}
            </div>
        </div>

        <div class="bg-yellow-50 rounded-lg p-3">
            <div class="text-xs text-muted">
                Sakit
            </div>

            <div class="font-bold text-yellow-600">
                {{ $sakit }}
            </div>
        </div>

        <div class="bg-red-50 rounded-lg p-3">
            <div class="text-xs text-muted">
                Alpa
            </div>

            <div class="font-bold text-red-600">
                {{ $alpa }}
            </div>
        </div>

    </div>

</div>
