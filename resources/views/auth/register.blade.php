<x-guest-layout>
    <form wire:submit.prevent="register">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" required autofocus
                          autocomplete="name"/>
            @error('name')
            <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <div>
            <div class="flex items-end">
                <!-- Phone Number -->
                <div data-tip="Make sure we can contact you" class="mt-4 flex flex-col justify-start tooltip w-1/2 mr-2">
                    <x-input-label class="text-start mb-1" for="phone" :value="__('Phone Number')"></x-input-label>
                    <x-text-input id="phone" class="block tooltip mt-1 w-full" type="tel" wire:model="phone" required
                                  autocomplete="phone"/>
                </div>

                <!-- Location -->
                <div class="mt-4 ml-2">
                    <x-input-label for="location" :value="__('Location')"></x-input-label>
                    <x-text-input id="location" disabled class="block mt-1 w-full" type="text" wire:model="location" required
                                  autocomplete="location"/>
                </div>
            </div>
            @error('phone')<x-input-error :messages="$message" class="mt-2"/> @enderror
            @error('location') <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email" required
                          autocomplete="username"/>
            @error('email')
            <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input id="password" class="block mt-1 w-full" type="password" wire:model="password" required
                          autocomplete="new-password"/>
            @error('password')
            <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                          wire:model="password_confirmation" required autocomplete="new-password"/>
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

    <script>
        let phoneInputField = document.querySelector("#phone");
        let phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            initialCountry: "auto",
            geoIpLookup: function (success, failure) {
                data = {
                    ip: "{{ request()->ip() }}"
                };
            },
        });

        // When we select a country, update the location field
        phoneInputField.addEventListener("countrychange", function () {
            let countryData = phoneInput.getSelectedCountryData();
            document.querySelector("#location").value = countryData.name;
            // update wire location
        });
    </script>
</x-guest-layout>
