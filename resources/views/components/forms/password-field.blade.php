@props([
    'showConfirmation' => true,
    'showGenerator' => true,
])

<div
    x-data="validationJS(
        @js(old('password')),
        @js(old('password_confirmation'))
    )"
    class="space-y-5"
>

    <x-forms.password-input
        :show-generator="$showGenerator"
    />

    <x-forms.password-strength />

    @if($showConfirmation)
        <x-forms.password-confirmation />
    @endif

</div>
