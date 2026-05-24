<form
    action="{{ Route::has('mahasiswa.import') ? route('mahasiswa.import') : '#' }}"
    method="POST"
    enctype="multipart/form-data"
    class="space-y-4"
>
    @csrf

    <input
        type="file"
        name="file"
        accept=".xlsx,.xls,.csv"
        required
        class="w-full rounded-lg border border-gray-300 p-3"
    >

    <button
        type="submit"
        class="rounded-lg bg-primary px-5 py-3 text-white"
    >
        Import Mahasiswa
    </button>
</form>