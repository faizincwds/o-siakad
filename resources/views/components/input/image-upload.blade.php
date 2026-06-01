@props([
    'name'
])

<div x-data="{ preview: null }">

    <input
        type="file"
        name="{{ $name }}"
        accept="image/*"
        class="hidden"
        x-ref="file"
        @change="
            const file = $event.target.files[0];
            preview = URL.createObjectURL(file)
        "
    >

    <div
        class="border-2 border-dashed border-card-border rounded-lg p-6 text-center cursor-pointer"
        @click="$refs.file.click()"
    >

        <template x-if="preview">
            <img
                :src="preview"
                class="mx-auto h-40 rounded-lg object-cover"
            >
        </template>

        <template x-if="!preview">
            <div>
                <span class="material-icons-outlined icon-xl text-muted">
                    image
                </span>

                <p class="mt-2 text-sm text-muted">
                    Klik untuk upload gambar
                </p>
            </div>
        </template>

    </div>

</div>