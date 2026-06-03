@props([
    'name' => 'otp',
    'label' => 'Kode OTP',
    'length' => 6,
])

<div
    x-data="{
        values: Array({{ $length }}).fill(''),
        update() {
            document.getElementById('{{ $name }}').value =
                this.values.join('');
        }
    }"
>

    @if($label)
        <label class="block mb-2 text-sm font-medium text-foreground">
            {{ $label }}
        </label>
    @endif

    <input
        type="hidden"
        id="{{ $name }}"
        name="{{ $name }}"
    >

    <div class="flex gap-2">

        @for($i=0; $i<$length; $i++)

            <input
                maxlength="1"
                type="text"
                x-model="values[{{ $i }}]"
                @input="
                    update();
                    if($event.target.value){
                        $refs['otp{{ $i+1 }}']?.focus()
                    }
                "
                x-ref="otp{{ $i }}"
                class="
                    w-12 h-12
                    text-center
                    rounded-lg
                    border border-card-border
                    bg-card
                    text-lg font-bold
                    focus:ring-2 focus:ring-brand-500
                "
            >

        @endfor

    </div>

</div>
