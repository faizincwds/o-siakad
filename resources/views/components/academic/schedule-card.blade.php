@props([
    'matkul' => '',
    'dosen' => '',
    'hari' => '',
    'jam' => '',
    'ruang' => '',
])

<div class="bg-card border border-card-border rounded-xl p-5">

    <div class="flex items-start justify-between">

        <div>

            <h3 class="font-semibold">
                {{ $matkul }}
            </h3>

            <div class="text-sm text-muted">
                {{ $dosen }}
            </div>

        </div>

        <span class="
            bg-brand-50
            text-brand-600
            text-xs
            px-2 py-1
            rounded-lg
        ">
            {{ $hari }}
        </span>

    </div>

    <div class="mt-4 space-y-2 text-sm">

        <div class="flex items-center gap-2">
            <span class="material-icons-outlined icon-sm">
                schedule
            </span>

            {{ $jam }}
        </div>

        <div class="flex items-center gap-2">
            <span class="material-icons-outlined icon-sm">
                meeting_room
            </span>

            {{ $ruang }}
        </div>

    </div>

</div>
