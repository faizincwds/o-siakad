@extends('layouts.app')

@section('title','Role & Permission')

@section('content')

<div
    x-data="{ role: 'administrator' }"
    class="space-y-5"
>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-5">

        {{-- ROLE LIST --}}
        <div
            class="bg-card border border-card-border rounded-xl p-4"
        >
           <div class="flex items-center justify-between mb-4">

                <h3 class="font-semibold text-md flex items-center gap-2">
                    <span class="material-icons-outlined icon-md">
                        person
                    </span>
                    Daftar Role
                </h3>

                <x-button.button
                    variant="primary"
                    icon="add"
                    size="xs"
                >
                    Role
                </x-button.button>

            </div>
            <hr class="border-card-border mb-4">

            <div class="space-y-2 text-sm font-semibold">

                <button
                    @click="role='administrator'"
                    class="w-full cursor-pointer flex items-center gap-2 px-3 py-2 rounded-lg text-left transition"
                    :class="role==='administrator'
                        ? 'bg-brand-600 text-white'
                        : 'hover:bg-surface text-foreground'"
                >
                    <span class="material-icons-outlined">
                        admin_panel_settings
                    </span>
                    Administrator
                </button>

                <button
                    @click="role='akademik'"
                    class="w-full cursor-pointer flex items-center gap-2 px-3 py-2 rounded-lg text-left transition"
                    :class="role==='akademik'
                        ? 'bg-brand-600 text-white'
                        : 'hover:bg-surface text-foreground'"
                >
                    <span class="material-icons-outlined">
                        school
                    </span>
                    Akademik
                </button>

                <button
                    @click="role='keuangan'"
                    class="w-full cursor-pointer flex items-center gap-2 px-3 py-2 rounded-lg text-left transition"
                    :class="role==='keuangan'
                        ? 'bg-brand-600 text-white'
                        : 'hover:bg-surface text-foreground'"
                >
                    <span class="material-icons-outlined">
                        payments
                    </span>
                    Keuangan
                </button>

                <button
                    @click="role='dosen'"
                    class="w-full cursor-pointer flex items-center gap-2 px-3 py-2 rounded-lg text-left transition"
                    :class="role==='dosen'
                        ? 'bg-brand-600 text-white'
                        : 'hover:bg-surface text-foreground'"
                >
                    <span class="material-icons-outlined">
                        person
                    </span>
                    Dosen
                </button>

                <button
                    @click="role='mahasiswa'"
                    class="w-full cursor-pointer flex items-center gap-2 px-3 py-2 rounded-lg text-left transition"
                    :class="role==='mahasiswa'
                        ? 'bg-brand-600 text-white'
                        : 'hover:bg-surface text-foreground'"
                >
                    <span class="material-icons-outlined">
                        groups
                    </span>
                    Mahasiswa
                </button>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="lg:col-span-3 space-y-5">

            {{-- PERMISSION PANEL --}}
            <div
                class="bg-card border border-card-border rounded-xl overflow-hidden"
            >

                <div class="p-5 border-b border-card-border">
                    <h3 class="font-semibold text-md flex items-center gap-2">
                        <span class="material-icons-outlined">shield</span>
                        Permission Matrix
                        <span
                            class="ml-auto px-2 py-1 rounded-full text-xs bg-brand-50 text-brand-600"
                            x-text="role"
                        ></span>
                    </h3>


                </div>

                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead>

                            <tr class="border-b border-card-border text-sm bg-surface">

                                <th class="text-left p-4">
                                    Modul
                                </th>

                                <th class="text-center p-4">
                                    View
                                </th>

                                <th class="text-center p-4">
                                    Create
                                </th>

                                <th class="text-center p-4">
                                    Update
                                </th>

                                <th class="text-center p-4">
                                    Delete
                                </th>

                            </tr>

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

                            <tr
                                class="border-b border-card-border hover:bg-surface transition"
                            >

                                <td
                                    class="p-4 text-sm font-medium"
                                >
                                    {{ $module }}
                                </td>

                                <td class="text-center">
                                    <input
                                        type="checkbox"
                                        checked
                                        class="w-4 h-4"
                                    >
                                </td>

                                <td class="text-center">
                                    <input
                                        type="checkbox"
                                        checked
                                        class="w-4 h-4"
                                    >
                                </td>

                                <td class="text-center">
                                    <input
                                        type="checkbox"
                                        checked
                                        class="w-4 h-4"
                                    >
                                </td>

                                <td class="text-center">
                                    <input
                                        type="checkbox"
                                        class="w-4 h-4"
                                    >
                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div
                    class="p-5 border-t border-card-border flex justify-between"
                >

                    <div class="text-sm text-muted">
                        Role aktif:
                        <span
                            class="font-semibold text-foreground"
                            x-text="role"
                        ></span>
                    </div>

                    <x-button.button
                        icon="save"
                        variant="success"
                    >
                        Simpan Permission
                    </x-button.button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
