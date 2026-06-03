@props([
    'title' => 'Terjadi Kesalahan',
    'dismissible' => true,
])

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition
    {{ $attributes->merge([
        'class' => 'rounded-lg border border-red-200 bg-red-50 text-red-700 dark:border-red-800 dark:bg-red-900/20 dark:text-red-400'
    ]) }}
>

    <div class="flex gap-3 p-4">

        <span class="material-icons-outlined">
            error
        </span>

        <div class="flex-1">

            <h4 class="font-semibold">
                {{ $title }}
            </h4>

            <div class="text-sm mt-1">
                {{ $slot }}
            </div>

        </div>

        @if($dismissible)
            <button
                type="button"
                @click="show=false"
                class="material-icons-outlined text-sm opacity-60 hover:opacity-100"
            >
                close
            </button>
        @endif

    </div>

</div>
