@extends('layouts.app')

@section('title','Role & Permission')

@section('content')

<div
    x-data="{
        role: 'akademik',
        showModalRole: false,
        showModalDeleteRole: false,
        modalMode: 'add',
        selectedRole: null,
        formRole: {
            label: '',
            name: '',
            icon: '',
            description: ''
        },
        roleList: [
            { id: 1, name: 'administrator', label: 'Administrator', icon: 'admin_panel_settings', desc: 'Akses penuh sistem' },
            { id: 2, name: 'akademik', label: 'Akademik', icon: 'school', desc: 'Kelola data akademik' },
            { id: 3, name: 'keuangan', label: 'Keuangan', icon: 'payments', desc: 'Kelola data keuangan' },
            { id: 4, name: 'dosen', label: 'Dosen', icon: 'person', desc: 'Akses data mengajar' },
            { id: 5, name: 'mahasiswa', label: 'Mahasiswa', icon: 'groups', desc: 'Akses data pribadi & nilai' },
        ]
    }"
    class="space-y-6"
>

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-card border border-card-border rounded-xl p-4 shadow-xs">
        <div class="flex items-center gap-2.5 text-muted text-sm">
            <span>Konfigurasi hak akses global untuk setiap role pengguna.</span>
        </div>

        <x-button.button
            variant="primary"
            icon="add"
            size="sm"
            class="text-xs w-full sm:w-auto justify-center whitespace-nowrap"
            @click="
                modalMode = 'add';
                formRole = { label: '', name: '', icon: '', description: '' };
                showModalRole = true;
            "
        >
            Tambah Role Baru
        </x-button.button>
    </div>

    <div class="grid grid-cols-12 gap-6 items-start">

        {{-- PANEL KIRI: DAFTAR ROLE --}}
        <div class="col-span-12 lg:col-span-4 bg-card border border-card-border rounded-xl shadow-xs overflow-hidden">
            <div class="p-4 bg-surface/30 border-b border-card-border flex items-center justify-between">
                <h3 class="font-semibold text-xs text-foreground uppercase tracking-wider flex items-center gap-2">
                    <span class="material-icons-outlined text-sm text-muted">tune</span>
                    Struktur Role
                </h3>
                <span class="px-2 py-0.5 text-sm font-medium bg-surface rounded-md text-muted border border-card-border" x-text="`${roleList.length} Roles`"></span>
            </div>

            <div class="p-2 space-y-1">
               <template x-for="item in roleList" :key="item.id">
                  <div
                      class="flex items-center justify-between p-1 rounded-lg border transition-all duration-150"
                      x-bind:class="role === item.name
                        ? 'bg-brand-50/60 dark:bg-brand-950/20 border-brand-100 dark:border-brand-900/30'
                        : 'bg-transparent border-transparent hover:bg-surface/60'"
                  >
                      {{-- Area Pilih Role --}}
                      <button
                          type="button"
                          class="flex items-center flex-1 py-2 px-2.5 rounded-md text-left cursor-pointer select-none"
                          @click="role = item.name"
                      >
                          <span
                              class="material-icons-outlined mr-3 text-lg transition-colors"
                              x-bind:class="role === item.name ? 'text-brand-600 dark:text-brand-400' : 'text-muted'"
                              x-text="item.icon"
                          ></span>
                          <span
                              class="text-sm font-medium tracking-wide"
                              x-bind:class="role === item.name ? 'text-brand-700 dark:text-brand-300 font-semibold' : 'text-foreground'"
                              x-text="item.label"
                          ></span>
                      </button>

                      {{-- Menu Dropdown Aksi --}}
                      <div class="shrink-0 pl-2">
                          <x-button.dropdown-button
                                variant="ghost"
                                text=""
                                size="xs"
                                class="py-1 px-2"
                                @click="role = item.name"
                          >
                              <button
                                  type="button"
                                  @click="
                                      modalMode = 'edit';
                                      selectedRole = item;
                                      formRole = { label: item.label, name: item.name, icon: item.icon, description: item.desc || '' };
                                      open = false;
                                      showModalRole = true;
                                  "
                                  class="w-full flex cursor-pointer items-center gap-2 px-3 py-1.5 text-xs text-left hover:bg-surface text-foreground transition-colors"
                              >
                                  <span class="material-icons-outlined text-sm">edit</span>
                                  Edit Role
                              </button>

                              <div class="border-t border-card-border my-1"></div>

                              <button
                                    type="button"
                                    @click="
                                        selectedRole = item;
                                        open = false;
                                        showModalDeleteRole = true;
                                    "
                                    class="w-full flex cursor-pointer items-center gap-2 px-3 py-1.5 text-xs text-left text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors"
                              >
                                    <span class="material-icons-outlined text-sm">delete</span>
                                    Hapus Role
                              </button>
                          </x-button.dropdown-button>
                      </div>
                  </div>
              </template>
            </div>
        </div>

        {{-- PANEL KANAN: PERMISSION MATRIX --}}
        <div class="col-span-12 lg:col-span-8 bg-card border border-card-border rounded-xl shadow-xs overflow-hidden">
            <div class="p-4 bg-surface/30 border-b border-card-border flex items-center justify-between">
                <h3 class="font-semibold text-xs text-foreground uppercase tracking-wider flex items-center gap-2">
                    <span class="material-icons-outlined text-muted">gavel</span>
                    Matrix Otorisasi
                </h3>
                <div class="flex items-center gap-2">
                    <span class="text-xs text-muted">Akses Aktif:</span>
                    <span class="px-2.5 py-0.5 rounded-md text-xs bg-brand-50 dark:bg-brand-950/50 text-brand-700 dark:text-brand-400 font-semibold capitalize border border-brand-100/50 dark:border-brand-900/30" x-text="role"></span>
                </div>
            </div>

            <div class="overflow-x-auto w-full">
                <x-table.table class="min-w-full text-left">
                    <thead>
                        <tr class="bg-surface/10 border-b border-card-border">
                            <x-table.th class="py-3 px-4 font-semibold text-xs tracking-wider text-muted uppercase">Modul Sistem</x-table.th>
                            <x-table.th class="py-3 px-2 font-semibold text-xs tracking-wider text-muted uppercase text-center w-24">View</x-table.th>
                            <x-table.th class="py-3 px-2 font-semibold text-xs tracking-wider text-muted uppercase text-center w-24">Create</x-table.th>
                            <x-table.th class="py-3 px-2 font-semibold text-xs tracking-wider text-muted uppercase text-center w-24">Update</x-table.th>
                            <x-table.th class="py-3 px-2 font-semibold text-xs tracking-wider text-muted uppercase text-center w-24">Delete</x-table.th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-card-border/60 bg-transparent">
                        @foreach([
                            'Dashboard', 'Mahasiswa', 'Dosen', 'Program Studi',
                            'Mata Kuliah', 'KRS', 'KHS', 'Jadwal Kuliah',
                            'PMB', 'Keuangan', 'Neo Feeder', 'User', 'Settings'
                        ] as $module)
                        <x-table.tr class="hover:bg-surface/20 transition-colors group">
                            <x-table.td class="py-3 px-4 font-medium text-sm text-foreground transition-colors">
                                {{ $module }}
                            </x-table.td>
                            <x-table.td class="py-3 px-2 text-center">
                                <input type="checkbox" checked class="w-4 h-4 text-brand-600 border-card-border rounded focus:ring-brand-500/30 dark:bg-gray-800 dark:border-gray-700 cursor-pointer">
                            </x-table.td>
                            <x-table.td class="py-3 px-2 text-center">
                                <input type="checkbox" checked class="w-4 h-4 text-brand-600 border-card-border rounded focus:ring-brand-500/30 dark:bg-gray-800 dark:border-gray-700 cursor-pointer">
                            </x-table.td>
                            <x-table.td class="py-3 px-2 text-center">
                                <input type="checkbox" checked class="w-4 h-4 text-brand-600 border-card-border rounded focus:ring-brand-500/30 dark:bg-gray-800 dark:border-gray-700 cursor-pointer">
                            </x-table.td>
                            <x-table.td class="py-3 px-2 text-center">
                                <input type="checkbox" class="w-4 h-4 text-brand-600 border-card-border rounded focus:ring-brand-500/30 dark:bg-gray-800 dark:border-gray-700 cursor-pointer">
                            </x-table.td>
                        </x-table.tr>
                        @endforeach
                    </tbody>
                </x-table.table>
            </div>

            <div class="p-4 border-t border-card-border flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 bg-surface/10">
                <div class="text-xs text-muted flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-xs"></span>
                    Perubahan memengaruhi hak akses secara real-time.
                </div>
                <x-button.button icon="save" variant="success" size="sm">
                    Simpan Konfigurasi
                </x-button.button>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH / EDIT ROLE --}}
    <x-modal.modal show="showModalRole" size="md">
        <div class="space-y-6">

            {{-- Section 1: Header & Icon Preview --}}
            <div class="flex items-center gap-4 p-4 bg-brand-50/50 dark:bg-brand-950/20 border border-brand-100/50 dark:border-brand-900/30 rounded-2xl">
                <div class="shrink-0 w-14 h-14 rounded-xl bg-white dark:bg-card border border-brand-200 dark:border-brand-800 flex items-center justify-center shadow-sm">
                    <span class="material-icons-outlined text-3xl text-brand-600" x-text="formRole.icon || 'fingerprint'"></span>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-foreground tracking-tight"
                        x-text="modalMode === 'add' ? 'Buat Role Baru' : 'Perbarui Role'"></h4>
                    <p class="text-xs text-muted leading-relaxed">
                        Setiap role memiliki kumpulan izin unik untuk mengakses modul sistem.
                    </p>
                </div>
            </div>

            {{-- Section 2: Form Input --}}
            <form class="space-y-5" @submit.prevent="showModalRole = false">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    {{-- Label Role (Nama yang muncul di UI) --}}
                    <x-input.input
                        name="role_label"
                        label="Nama Tampilan Role"
                        placeholder="Contoh: Admin Keuangan"
                        icon="title"
                        required
                        x-model="formRole.label"
                    />

                    {{-- Icon (Material Icon Name) --}}
                    <x-input.input
                        name="role_icon"
                        label="Material Icon"
                        placeholder="Contoh: payments, school"
                        icon="category"
                        x-model="formRole.icon"
                    />
                </div>

                {{-- System Name / Identifier --}}
                <div class="space-y-1">
                    <x-input.input
                        name="role_name"
                        label="System Identifier (Slug)"
                        placeholder="contoh: admin_keuangan"
                        icon="terminal"
                        required
                        x-model="formRole.name"
                    />
                    <p class="text-[10px] text-muted px-1 italic">*Gunakan huruf kecil dan underscore (tanpa spasi)</p>
                </div>

                {{-- Deskripsi --}}
                <x-input.textarea
                    name="role_description"
                    label="Deskripsi Hak Akses"
                    placeholder="Jelaskan secara singkat tanggung jawab role ini..."
                    icon="description"
                    rows="3"
                    x-model="formRole.description"
                />

                {{-- Section 3: Footer Actions --}}
                <div class="pt-4 border-t border-card-border flex justify-end gap-3">
                    <x-button.button
                        type="button"
                        variant="ghost"
                        size="md"
                        @click="showModalRole = false"
                        class="font-semibold"
                    >
                        Batal
                    </x-button.button>

                    <x-button.button
                        type="submit"
                        variant="primary"
                        icon="save"
                        size="md"
                        class="shadow-md shadow-brand-500/20 font-bold"
                    >
                        <span x-text="modalMode === 'add' ? 'Simpan Role' : 'Perbarui Role'"></span>
                    </x-button.button>
                </div>
            </form>
        </div>
    </x-modal.modal>

    {{-- MODAL KONFIRMASI HAPUS ROLE --}}
    <x-modal.modal show="showModalDeleteRole" title="Konfirmasi Hapus" size="sm">
        <div class="text-center p-2">
            <div class="w-12 h-12 rounded-full bg-red-50 dark:bg-red-950/50 flex items-center justify-center mx-auto mb-3.5 border border-red-100 dark:border-red-900/30">
                <span class="material-icons-outlined text-red-600 dark:text-red-400 text-2xl">warning</span>
            </div>

            <h4 class="text-base font-bold text-foreground tracking-tight mb-1">Hapus Role Terpilih?</h4>
            <p class="text-xs text-muted leading-relaxed px-1">
                Apakah Anda yakin ingin menghapus role <span class="font-bold text-foreground" x-text="selectedRole ? selectedRole.label : ''"></span>? Pengguna dengan hak akses ini tidak akan bisa mengakses modul sistem terkait.
            </p>
        </div>

        <x-slot:footer>
            <div class="flex justify-end gap-2 w-full">
                <x-button.button type="button" variant="ghost" size="sm" @click="showModalDeleteRole = false">
                    Batal
                </x-button.button>
                <form action="#" method="POST" class="inline" @submit.prevent="showModalDeleteRole = false; console.log('Hapus role ID:', selectedRole?.id)">
                    @csrf
                    @method('DELETE')
                    <x-button.button type="submit" variant="danger" icon="delete" size="sm">
                        Ya, Hapus Role
                    </x-button.button>
                </form>
            </div>
        </x-slot:footer>
    </x-modal.modal>

</div>

@endsection
