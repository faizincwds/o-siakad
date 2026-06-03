@extends('layouts.app')

@section('title','Role & Permission')

@section('content')

<div
    x-data="{
        role: 'administrator',
        showModalRole: false,
        modalMode: 'add',
        selectedRole: null,
        formRole: {
            name: '',
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
    class="space-y-5"
>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">

        {{-- DAFTAR ROLE --}}
        <div class="bg-card border border-card-border rounded-xl p-4">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-md flex items-center gap-2">
                    <span class="material-icons-outlined icon-md">person</span>
                    Daftar Role
                </h3>

                <x-button.button
                    variant="primary"
                    icon="add"
                    size="xs"
                    @click="
                        modalMode = 'add';
                        formRole = { name: '', description: '' };
                        showModalRole = true;
                    "
                >
                    Role
                </x-button.button>
            </div>

            <hr class="border-card-border mb-4">

            <div class="space-y-2 text-sm font-semibold">
               <template x-for="item in roleList" :key="item.id">
                  <div class="flex items-center gap-2">
                      {{-- Tombol pilih role --}}
                      <x-button.button
                          variant="ghost"
                          class="flex-1 justify-start"
                          x-bind:class="role === item.name 
                              ? 'bg-brand-600 text-white hover:bg-brand-700' 
                              : 'hover:bg-surface text-foreground'"
                          @click="role = item.name"
                      >
                          <span class="material-icons-outlined mr-2" x-text="item.icon"></span>
                          <span x-text="item.label"></span>
                      </x-button.button>
              
                      {{-- TOMBOL SPLIT UNTUK EDIT & HAPUS --}}
                      <x-button.split-button 
                            variant="primary"
                            class="flex-1 justify-start"
                            x-bind:class="role === item.name 
                              ? 'bg-brand-600 text-white hover:bg-brand-700' 
                              : 'hover:bg-surface text-foreground'"
                            @click="role = item.name">
                          {{-- Isi menu dropdown --}}
                          <button
                              @click="
                                  modalMode = 'edit';
                                  selectedRole = item;
                                  formRole = { name: item.name, description: item.desc || '' };
                                  open = false; // Tutup dropdown setelah diklik
                                  showModalRole = true;
                              "
                              class="w-full flex items-center gap-2 px-4 py-2 text-sm text-left hover:bg-surface transition-colors"
                          >
                              <span class="material-icons-outlined icon-sm">edit</span>
                              Edit Role
                          </button>
              
                          <div class="border-t border-card-border my-1"></div>
              
                          <button
                              @click="
                                  if(confirm('Yakin ingin menghapus role ini?')) {
                                      console.log('Hapus role:', item.id);
                                      // Tambahkan logika hapus ke database di sini
                                      open = false;
                                  }
                              "
                              class="w-full flex items-center gap-2 px-4 py-2 text-sm text-left text-red-600 hover:bg-red-50 dark:hover:bg-red-500/10 transition-colors"
                          >
                              <span class="material-icons-outlined icon-sm">delete</span>
                              Hapus Role
                          </button>
                      </x-button.split-button>
                  </div>
              </template>

            </div>
        </div>

        {{-- BAGIAN PERMISSION --}}
        <div class="lg:col-span-3 space-y-5">
            <div class="bg-card border border-card-border rounded-xl overflow-hidden">
                <div class="p-5 border-b border-card-border flex items-center justify-between">
                    <h3 class="font-semibold text-md flex items-center gap-2">
                        <span class="material-icons-outlined">shield</span>
                        Permission Matrix
                    </h3>
                    <span class="px-3 py-1 rounded-full text-xs bg-brand-50 text-brand-600 capitalize" x-text="role"></span>
                </div>

                {{-- TABEL MENGGUNAKAN COMPONENTS --}}
                <div class="overflow-x-auto">
                    <x-table.table>
                        <thead>
                            <x-table.th>Modul</x-table.th>
                            <x-table.th class="text-center">View</x-table.th>
                            <x-table.th class="text-center">Create</x-table.th>
                            <x-table.th class="text-center">Update</x-table.th>
                            <x-table.th class="text-center">Delete</x-table.th>
                        </thead>
                        
                        <tbody>
                        @foreach([
                            'Dashboard',
                            'Mahasiswa',
                            'Dosen',
                            'Program Studi',
                            'Mata Kuliah',
                            'KRS',
                            'KHS',
                            'Jadwal Kuliah',
                            'PMB',
                            'Keuangan',
                            'Neo Feeder',
                            'User',
                            'Settings'
                        ] as $module)
                        <x-table.tr>
                            <x-table.td class="font-medium">
                                {{ $module }}
                            </x-table.td>
                            <x-table.td class="text-center">
                                <input type="checkbox" checked class="w-4 h-4 text-brand-600 border-card-border rounded focus:ring-brand-500">
                            </x-table.td>
                            <x-table.td class="text-center">
                                <input type="checkbox" checked class="w-4 h-4 text-brand-600 border-card-border rounded focus:ring-brand-500">
                            </x-table.td>
                            <x-table.td class="text-center">
                                <input type="checkbox" checked class="w-4 h-4 text-brand-600 border-card-border rounded focus:ring-brand-500">
                            </x-table.td>
                            <x-table.td class="text-center">
                                <input type="checkbox" class="w-4 h-4 text-brand-600 border-card-border rounded focus:ring-brand-500">
                            </x-table.td>
                        </x-table.tr>
                        @endforeach
                        </tbody>
                    </x-table.table>
                </div>

                <div class="p-5 border-t border-card-border flex justify-between items-center">
                    <div class="text-sm text-muted">
                        Role aktif: <span class="font-semibold text-foreground capitalize" x-text="role"></span>
                    </div>
                    <x-button.button icon="save" variant="success">
                        Simpan Permission
                    </x-button.button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL TAMBAH / EDIT ROLE --}}
    <x-modal.modal
        show="showModalRole"
        title="Role"
        size="md"
    >
        <div class="mb-4">
            <h4 class="text-lg font-semibold text-foreground" x-text="modalMode === 'add' ? 'Tambah Role Baru' : 'Edit Role'"></h4>
        </div>

        <form class="space-y-4" @submit.prevent="
            console.log(modalMode === 'add' ? 'Simpan Role:' : 'Update Role:', formRole);
            showModalRole = false;
            formRole = { name: '', description: '' };
        ">
            <x-input.input
                label="Nama Role"
                name="name"
                placeholder="Contoh: Operator, Bendahara"
                required
                x-model="formRole.name"
            />

            <x-input.input
                label="Keterangan"
                name="description"
                placeholder="Deskripsi singkat tentang hak akses role ini"
                x-model="formRole.description"
            />

            <x-slot:footer>
                <x-button.button
                    variant="ghost"
                    @click="showModalRole = false"
                >
                    Batal
                </x-button.button>

                <x-button.button
                    type="submit"
                    variant="primary"
                    icon="save"
                    x-text="modalMode === 'add' ? 'Simpan Role' : 'Perbarui Role'"
                />
            </x-slot:footer>
        </form>
    </x-modal.modal>

</div>

@endsection
