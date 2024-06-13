<div>
    <form wire:submit.prevent="register">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model.live="name" required autofocus
                          autocomplete="name"/>
            @error('name')
            <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <div class="flex items-center gap-4">
            <!-- Phone Number -->
            <div class="mt-4 w-1/2">
                <x-input-label for="phone" :value="__('Phone Number')"></x-input-label>
                <x-text-input id="phone" class="block mt-1 w-full" type="tel" wire:model.live="phone" required
                              autocomplete="phone"/>
                @error('phone')
                <x-input-error :messages="$message" class="mt-2"></x-input-error> @enderror
            </div>

            <!-- Location -->
            <div class="mt-4 w-1/2">
                <x-input-label for="location" :value="__('Location')"></x-input-label>
                <x-text-input id="location" class="block mt-1 w-full" type="text" wire:model.lazy="location" required
                              autocomplete="location"/>
                @error('location')
                <x-input-error :messages="$message" class="mt-2"></x-input-error> @enderror
            </div>
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model.lazy="email" required
                          autocomplete="username"/>
            @error('email')
            <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input id="password" class="block mt-1 w-full" type="password" wire:model.lazy="password" required
                          autocomplete="new-password"/>
            @error('password')
            <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                          wire:model.lazy="password_confirmation" required autocomplete="new-password"/>
            @error('password_confirmation')
            <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4" type="submit">
                {{ __('Register') }}
                <i class="fas fa-lock ml-2"></i>
            </x-primary-button>
        </div>
    </form>

    @script
    <script>
        let phoneInputField = document.querySelector("#phone");
        let phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
    </script>
    @endscript
</div>
