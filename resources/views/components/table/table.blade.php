<div class="
    bg-card
    border border-card-border
    rounded-xl
    overflow-hidden
">
    <div class="overflow-x-auto">
        <table
            {{
                $attributes->merge([
                    'class' => 'w-full text-sm'
                ])
            }}
        >
            {{ $slot }}
        </table>
    </div>
</div>
