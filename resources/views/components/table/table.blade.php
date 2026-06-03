<div class="
    bg-card
    border-card-border
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
