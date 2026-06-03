@props([
    'semester' => '',
    'sks' => 0,
    'status' => 'Draft',
])

<div class="bg-card border border-card-border rounded-xl p-5">

    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold flex items-center gap-2">
            <span class="material-icons-outlined">fact_check</span>
            Kartu Rencana Studi
        </h3>

        <span class="
            px-2 py-1 rounded-lg text-xs font-medium
            bg-brand-50 text-brand-600
        ">
            {{ $status }}
        </span>
    </div>

    <div class="space-y-2 text-sm">

        <div class="flex justify-between">
            <span class="text-muted">Semester</span>
            <span>{{ $semester }}</span>
        </div>

        <div class="flex justify-between">
            <span class="text-muted">Total SKS</span>
            <span>{{ $sks }} SKS</span>
        </div>

    </div>

    <div class="mt-4">
        {{ $slot }}
    </div>

</div>
