<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                          autofocus autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>

            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password"/>
                <!-- Show Password Button -->
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                    <button type="button" onclick="togglePasswordVisibility()">
                        <i id="eyeIcon" class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <script>
                function togglePasswordVisibility() {
                    var passwordInput = document.getElementById('password');
                    var eyeIcon = document.getElementById('eyeIcon');

                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        eyeIcon.classList.remove('fa-eye');
                        eyeIcon.classList.add('fa-eye-slash');
                    } else {
                        passwordInput.type = "password";
                        eyeIcon.classList.remove('fa-eye-slash');
                        eyeIcon.classList.add('fa-eye');
                    }
                }
            </script>

            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
