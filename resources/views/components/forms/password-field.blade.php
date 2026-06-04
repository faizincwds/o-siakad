@props([
    'name' => 'password',
    'confirmation' => true,
    'generator' => true,
    'copy' => true,
])

<div x-data="{
    password: '',
    confirmPassword: '',

    visible: false,
    visibleConfirm: false,

    capslock: false,

    get passwordMatch() {
        return this.password === this.confirmPassword;
    },

    generatePassword() {

        const chars =
            'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789!@#$%';

        let result = '';

        for (let i = 0; i < 12; i++) {

            result += chars.charAt(
                Math.floor(Math.random() * chars.length)
            );
        }

        this.password = result;
    },

    copyPassword() {

        navigator.clipboard.writeText(this.password);

        if (window.toast) {
            toast('Password berhasil disalin', 'success');
        }
    },

    get score() {

        let score = 0;

        if (this.password.length >= 8) score++;
        if (/[A-Z]/.test(this.password)) score++;
        if (/[a-z]/.test(this.password)) score++;
        if (/[0-9]/.test(this.password)) score++;
        if (/[^A-Za-z0-9]/.test(this.password)) score++;

        return score;
    },

    get strengthWidth() {
        return this.score * 20;
    },

    get strengthLabel() {

        return [
            'Sangat Lemah',
            'Lemah',
            'Cukup',
            'Baik',
            'Kuat',
            'Sangat Kuat'
        ][this.score];
    },

    get strengthColor() {

        return [
            '#ef4444',
            '#f97316',
            '#facc15',
            '#22c55e',
            '#16a34a',
            '#15803d'
        ][this.score];
    },

    get hasMinLength() {
        return this.password.length >= 8;
    },

    get hasUppercase() {
        return /[A-Z]/.test(this.password);
    },

    get hasLowercase() {
        return /[a-z]/.test(this.password);
    },

    get hasNumber() {
        return /[0-9]/.test(this.password);
    },

    get hasSymbol() {
        return /[^A-Za-z0-9]/.test(this.password);
    }
}" class="space-y-5">

    <x-forms.password-input :name="$name" :show-generator="$generator" :show-copy="$copy" />

    <x-forms.password-strength />

    @if ($confirmation)
        <x-forms.password-confirmation />
    @endif

</div>
