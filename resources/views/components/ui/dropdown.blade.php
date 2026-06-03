<div
    x-data="{open:false}"
    class="relative"
>

    <div
        @click="open=!open"
    >
        {{ $trigger }}
    </div>

    <div
        x-show="open"
        @click.outside="open=false"
        class="
        absolute right-0 mt-2
        bg-card border border-card-border
        rounded-lg shadow-lg min-w-48
        "
    >
        {{ $slot }}
    </div>

</div>
