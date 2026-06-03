@props([
    'title' => 'Perhatian',
    'dismissible' => true,
])

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition
    {{ $attributes->merge([
        'class' => 'rounded-lg border border-yellow-200 bg-yellow-50 text-yellow-700 dark:border-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400'
    ]) }}
>

    <div class="flex gap-3 p-4">

        <span class="material-icons-outlined">
            warning
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
