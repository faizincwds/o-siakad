@extends('layouts.auth')

@section('title', 'Create Account')

@section('content')
    <img src="{{ asset('logo-siakad.svg') }}" class="mb-10" alt="e-SIAKAD">
    <h2 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">
        @yield('title')
    </h2>

    <p class="mb-9 text-sm text-gray-500 dark:text-gray-400">
        Enter your details below to create your account!
    </p>

    <form
        method="POST"
        action="{{ Route::has('register') ? route('register') : '#' }}"
        class="space-y-5"
    >
        @csrf

        <!-- Name -->
        <div>
            <label class="mb-2.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Full Name <span class="text-red-500">*</span>
            </label>

            <div class="relative">
                <input
                    type="text"
                    name="name"
                    placeholder="Enter your full name"
                    value="{{ old('name') }}"
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 pl-5 pr-12 text-gray-900 outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-gray-700 dark:bg-gray-800/50 dark:text-white"
                    required
                >

                <span class="absolute right-4 top-3.5 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5.121 17.804A9 9 0 1118.88 17.8M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                    </svg>
                </span>
            </div>

            @error('name')
                <p class="mt-1.5 flex items-center gap-1.5 text-xs text-red-500">
                    <svg class="h-3.5 w-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label class="mb-2.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                Email <span class="text-red-500">*</span>
            </label>

            <div class="relative">
                <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    class="w-full rounded-lg border border-gray-300 bg-transparent py-3 pl-5 pr-12 text-gray-900 outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-gray-700 dark:bg-gray-800/50 dark:text-white"
                    required
                >

                <span class="absolute right-4 top-3.5 text-gray-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                        />
                    </svg>
                </span>
            </div>

            @error('email')
                <p class="mt-1.5 flex items-center gap-1.5 text-xs text-red-500">
                    <svg class="h-3.5 w-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Password Section -->
        <div
            x-data="validationJS(@json(old('password')), @json(old('password_confirmation')))"
            class="space-y-5"
        >
            <!-- Password -->
            <div>
                <div class="mb-2.5 flex items-center justify-between">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Password <span class="text-red-500">*</span>
                    </label>

                    <button
                        type="button"
                        @click="generatePassword()"
                        class="text-xs font-medium text-primary hover:underline"
                    >
                        Generate Password
                    </button>
                </div>

            <div class="relative">
                <input
                    :type="showPassword ? 'text' : 'password'"
                    name="password"
                    placeholder="Enter your password"
                    class="w-full rounded-lg border border-stroke bg-transparent py-3 pl-5 pr-12 text-gray-900 outline-none transition focus:border-primary focus:ring-1 focus:ring-primary dark:border-strokedark dark:bg-gray-800/50 dark:text-white dark:focus:border-primary"
                >

                <span
                    @click="showPassword = !showPassword"
                    class="absolute right-4 top-3.5 cursor-pointer text-gray-400"
                >
                    <svg
                        x-show="!showPassword"
                        x-transition.opacity
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                        />
                    </svg>

                    <svg
                        x-show="showPassword"
                        x-transition.opacity
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.956 9.956 0 012.042-3.368M6.223 6.223A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a9.97 9.97 0 01-4.132 5.411M15 12a3 3 0 00-3-3m0 0a2.996 2.996 0 00-2.12.879M12 9l-8 8m8-8l8 8"
                        />
                    </svg>
                </span>
            </div>

            @error('password')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

            <!-- Confirm Password -->
            <div>
                <label class="mb-2.5 block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Confirm Password <span class="text-red-500">*</span>
                </label>

                <div class="relative">
                    <input
                        :type="showConfirmPassword ? 'text' : 'password'"
                        name="password_confirmation"
                        x-model="confirmPassword"
                        placeholder="Confirm your password"
                        class="w-full rounded-lg border border-gray-300 bg-transparent py-3 pl-5 pr-12 text-gray-900 outline-none transition focus:border-primary focus:ring-2 focus:ring-primary/20 dark:border-gray-700 dark:bg-gray-800/50 dark:text-white"
                        required
                    >

                    <!-- Eye Toggle Button -->
                    <button
                        type="button"
                        @click="showConfirmPassword = !showConfirmPassword"
                        class="absolute right-3 top-3 text-gray-400 transition-colors hover:text-primary"
                        :title="showConfirmPassword ? 'Hide password' : 'Show password'"
                    >
                        <!-- Eye Open -->
                        <span x-show="!showConfirmPassword" x-cloak>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- Bentuk Mata -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                <!-- Bulatan Pupil -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </span>

                        <!-- Eye Off -->
                        <span x-show="showConfirmPassword" x-cloak>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <!-- Bentuk Mata -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                <!-- Bulatan Pupil -->
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <!-- Garis Coretan Miring -->
                                <line x1="3" y1="3" x2="21" y2="21" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </span>
                    </button>
                </div>

                <!-- Match Indicator -->
                <div x-show="confirmPassword.length > 0" x-transition class="mt-2">

                    <div
                        x-show="!passwordMatch"
                        class="flex items-center gap-2 rounded-lg border border-red-200 bg-red-50 px-3 py-2 text-sm text-red-600 dark:border-red-700 dark:bg-red-900/20 dark:text-red-400"
                    >
                        <svg class="h-4 w-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Passwords do not match</span>
                    </div>
                </div>

                <!-- Confirm Password Error -->
                @error('password_confirmation')
                    <p class="mt-1.5 flex items-center gap-1.5 text-xs text-red-500">
                        <svg class="h-3.5 w-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        <!-- Terms -->
        <div class="flex items-start gap-3">
            <input
                type="checkbox"
                name="terms"
                id="terms"
                class="mt-0.5 h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary dark:border-gray-600 dark:bg-gray-800"
                required
            >

            <label for="terms" class="cursor-pointer text-sm text-gray-600 dark:text-gray-400">
                I agree to the
                <a href="#" class="font-medium text-primary hover:underline">Terms & Conditions</a>
            </label>
        </div>

        @error('terms')
            <p class="flex items-center gap-1.5 text-xs text-red-500">
                <svg class="h-3.5 w-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $message }}
            </p>
        @enderror

        <!-- Submit Button -->
        <x-button type="submit" variant="primary" size="md" class="w-full">
            <span class="material-icons-outlined text-[20px]">person_add</span>
            <span>Create Account</span>
        </x-button>
    </form>

    <!-- Login Link -->
    <div class="mt-8 text-center">
        <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
            Already have an account?
            <a
                href="{{ Route::has('login') ? route('login') : '#' }}"
                class="text-primary hover:underline"
            >
                Sign In
            </a>
        </p>
    </div>
@endsection
