<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="mt-8">
        @csrf
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus
                          autocomplete="name" value="{{ old('name') }}"/>
            @error('name')
            <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <div>
            <div class="flex items-end">
                <!-- Phone Number -->
                <div data-tip="Make sure we can contact you" class="mt-4 flex flex-col justify-start tooltip w-1/2 mr-2">
                    <x-input-label class="text-start mb-1" for="phone" :value="__('Phone Number')"></x-input-label>
                    <x-text-input id="phone" class="block tooltip mt-1 w-full" type="tel" name="phone" required
                                  autocomplete="phone" value="{{ old('phone') }}"/>
                </div>

                <!-- Location -->
                <div class="mt-4 w-1/2x ml-2">
                    <x-input-label for="location" :value="__('Location')"></x-input-label>
                    <x-text-input id="location" class="block phone opacity-30 mt-1 w-full" type="text" name="location" required
                                  autocomplete="location" value="{{ old('location') }}"/>
                </div>
            </div>
            @error('phone')<x-input-error :messages="$message" class="mt-2"/> @enderror
            @error('location') <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required
                          autocomplete="username" value="{{ old('email') }}"/>
            @error('email')
            <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')"/>
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                          autocomplete="new-password"/>
            @error('password')
            <x-input-error :messages="$message" class="mt-2"/> @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                          name="password_confirmation" required autocomplete="new-password"/>
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
        // Wait for the page to load
        window.onload = function () {

            // Initialize variables
            let phoneInputField = document.querySelector("#phone");
            let update_location_success = false;
            let placeholder = null;

            let phoneInput = window.intlTelInput(phoneInputField, {
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
                initialCountry: "auto",
                //add favourite countries
                preferredCountries: ["us", "gb", "ca", "au", "nz"],
                geoIpLookup: function (success, failure) {
                    try {
                        fetch("https://ipinfo.io/json?token=cbcffb988673b9", {
                            headers: {
                                "Accept": "application/json",
                            },
                            mode: "cors",
                        }).then((resp) => {
                            if (resp.ok) {
                                return resp.json();
                            }
                            return Promise.reject("Failed to fetch location from IP");
                        }).then((data) => {
                            let countryCode = data.country;
                            success(countryCode);

                            // Set success flag to true
                            update_location_success = true;
                        }).catch((err) => {
                            console.error(err);
                            failure("NG");
                        });
                    } catch (error) {
                        console.error(error);
                        failure("NG");
                    }
                },
            });

            if (!update_location_success) {
                // Default to US if we can't get the location
                phoneInput.setCountry("us");
                document.querySelector("#location").value = "United States";
                placeholder = document.querySelector('[data-intl-tel-input-id="0"]').placeholder;
            }

            // When we select a country, update the location field
            phoneInputField.addEventListener("countrychange", function () {
                let countryData = phoneInput.getSelectedCountryData();
                document.querySelector("#location").value = countryData.name;

                //get the placeholder for data-intl-tel-input-id="0"
                placeholder = document.querySelector('[data-intl-tel-input-id="0"]').placeholder;
            });
        }
    </script>
</x-guest-layout>
