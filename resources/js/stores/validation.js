export default function validationJS(oldPassword = '', oldConfirmPassword = '') {
    return {
        password: oldPassword,
        confirmPassword: oldConfirmPassword,
        showPassword: false,
        showConfirmPassword: false,
        capslock: false,

        generatePassword() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+';
            this.password = Array.from(
                { length: 14 },
                () => chars[Math.floor(Math.random() * chars.length)]
            ).join('');
            this.confirmPassword = this.password;
        },

        copyPassword() {
            navigator.clipboard.writeText(this.password);
        },

        get passwordMatch() {
            return this.password === this.confirmPassword && this.confirmPassword.length > 0;
        },

        get hasUppercase() { return /[A-Z]/.test(this.password); },
        get hasLowercase() { return /[a-z]/.test(this.password); },
        get hasNumber() { return /[0-9]/.test(this.password); },
        get hasSymbol() { return /[^A-Za-z0-9]/.test(this.password); },
        get hasMinLength() { return this.password.length >= 8; },

        get strength() {
            let score = 0;
            if (this.hasUppercase) score++;
            if (this.hasLowercase) score++;
            if (this.hasNumber) score++;
            if (this.hasSymbol) score++;
            if (this.hasMinLength) score++;
            return score;
        },

        get strengthLabel() {
            if (this.strength <= 2) return 'Weak';
            if (this.strength <= 4) return 'Medium';
            return 'Strong';
        },

        get strengthWidth() {
            return (this.strength / 5) * 100;
        },

        get strengthColor() {
            if (this.strength <= 2) return '#ef4444';
            if (this.strength <= 4) return '#eab308';
            return '#22c55e';
        },

        get strengthTextColor() {
            if (this.strength <= 2) return 'text-red-500';
            if (this.strength <= 4) return 'text-yellow-500';
            return 'text-green-500';
        }
        
        
    };
}

window.validationJS = validationJS;