<div class="bg-card border border-card-border rounded-xl">

    <div class="p-4 border-b border-card-border">

        <h3 class="font-semibold">
            Aktivitas Terbaru
        </h3>

    </div>

    <div class="divide-y divide-card-border">

        @foreach(range(1,5) as $i)

            <div class="p-4 flex gap-3">

                <span class="material-icons-outlined text-brand-600">
                    history
                </span>

                <div>

                    <div class="font-medium">
                        Login Sistem
                    </div>

                    <div class="text-xs text-muted">
                        2 menit lalu
                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>
