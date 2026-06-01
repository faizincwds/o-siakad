@props([
    'name',
    'label' => null,
])

<label
    x-data="{ on: @js($attributes->has('checked')) }"
    class="flex items-center gap-3 cursor-pointer"
>

    <input
        type="checkbox"
        name="{{ $name }}"
        class="hidden"
        x-model="on"
        {{ $attributes }}
    >

    <div
        class="relative h-6 w-11 rounded-full transition"
        :class="on
            ? 'bg-brand-600'
            : 'bg-gray-300'"
    >
        <span
            class="absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white transition"
            :class="on ? 'translate-x-5' : ''"
        ></span>
    </div>

    @if($label)
        <span class="text-sm text-foreground">
            {{ $label }}
        </span>
    @endif

</label>