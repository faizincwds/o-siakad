@props([
    'modules' => [],
])

<div class="overflow-x-auto">
    <table class="w-full text-sm">

        <thead>
        <tr
            class="
                border-b
                border-card-border
                bg-surface
            "
        >
            <th class="text-left p-4">
                Modul
            </th>

            <th class="text-center p-4 w-24">
                View
            </th>

            <th class="text-center p-4 w-24">
                Create
            </th>

            <th class="text-center p-4 w-24">
                Update
            </th>

            <th class="text-center p-4 w-24">
                Delete
            </th>
        </tr>
        </thead>

        <tbody>

        @foreach($modules as $module)

            <tr class="border-b border-card-border">

                <td class="p-4 font-medium">
                    {{ $module }}
                </td>

                <td class="text-center">
                    <x-permission.permission-toggle checked />
                </td>

                <td class="text-center">
                    <x-permission.permission-toggle checked />
                </td>

                <td class="text-center">
                    <x-permission.permission-toggle checked />
                </td>

                <td class="text-center">
                    <x-permission.permission-toggle />
                </td>

            </tr>

        @endforeach

        </tbody>

    </table>
</div>
