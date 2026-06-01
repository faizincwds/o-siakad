@extends('layouts.app')

@section('title','Role & Permission')

@section('content')

<div
    x-data="{
        role:'administrator'
    }"
    class="space-y-5"
>

    <div
        class="grid grid-cols-1 font-semibold text-sm lg:grid-cols-4 gap-5"
    >

        <!-- ROLE LIST -->
        <div
            class="bg-card border border-card-border rounded-xl p-4"
        >

            <div class="space-y-2">

                <button
                    @click="role='administrator'"
                    class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-left"
                    :class="role==='administrator'
                    ? 'bg-brand-500 text-white'
                    : 'hover:bg-surface'"
                >
                    <span class="material-icons-outlined">
                        admin_panel_settings
                    </span>

                    Administrator
                </button>

                <button
                    @click="role='akademik'"
                    class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-left"
                    :class="role==='akademik'
                    ? 'bg-brand-500 text-white'
                    : 'hover:bg-surface'"
                >
                    <span class="material-icons-outlined">
                        school
                    </span>

                    Akademik
                </button>

                <button
                    @click="role='keuangan'"
                    class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-left"
                    :class="role==='keuangan'
                    ? 'bg-brand-500 text-white'
                    : 'hover:bg-surface'"
                >
                    <span class="material-icons-outlined">
                        payments
                    </span>

                    Keuangan
                </button>

                <button
                    @click="role='dosen'"
                    class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-left"
                    :class="role==='dosen'
                    ? 'bg-brand-500 text-white'
                    : 'hover:bg-surface'"
                >
                    <span class="material-icons-outlined">
                        person
                    </span>

                    Dosen
                </button>

                <button
                    @click="role='mahasiswa'"
                    class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-left"
                    :class="role==='mahasiswa'
                    ? 'bg-brand-500 text-white'
                    : 'hover:bg-surface'"
                >
                    <span class="material-icons-outlined">
                        groups
                    </span>

                    Mahasiswa
                </button>

            </div>

        </div>
    <!-- Header -->
    <div class="flex items-center justify-end">

        <x-button.button
            variant="primary"
            icon="add"
            size="sm"
        >
            Tambah
        </x-button.button>

    </div>
        <!-- PERMISSION -->
        <div
            class="lg:col-span-3
            bg-card border border-card-border
            rounded-xl"
        >

            <div
                class="p-5 border-b text-sm border-card-border"
            >
                <h3
                    class="font-semibold text-md flex items-center gap-2"
                >
                    <span class="material-icons-outlined">
                        shield
                    </span>
                    Permission Matrix
                </h3>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">

                    <thead>

                    <tr
                        class="border-b border-card-border"
                    >

                        <th
                            class="text-left p-4"
                        >
                            Modul
                        </th>

                        <th
                            class="text-center p-4"
                        >
                            View
                        </th>

                        <th
                            class="text-center p-4"
                        >
                            Create
                        </th>

                        <th
                            class="text-center p-4"
                        >
                            Update
                        </th>

                        <th
                            class="text-center p-4"
                        >
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
                        class="border-b border-card-border"
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
                class="p-5 border-t border-card-border flex justify-end"
            >

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

@endsection