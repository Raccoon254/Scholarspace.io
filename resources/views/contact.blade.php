<x-logged-out>
    <x-slot name="title">
        Contact Us - Scholarspace support
    </x-slot>
<div class="bg-gray-50 flex items-center">
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex text-black/80 flex-col md:flex-row items-center justify-between">
            <div class="mb-6 md:mb-0 md:w-1/2">
                <h1 class="text-4xl font-bold text-black/90 mb-4">Contact Us</h1>
                <p class="text-lg text-black/50 mb-6">Have a question or need assistance? Our friendly support team is here to help. Fill out the form below, and we'll get back to you as soon as possible.</p>
                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-black/70 font-semibold mb-2">Name</label>
                        <x-text-input id="name" name="name" :required="true" class="w-full" />
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for='email' class="block text-black/70 font-semibold mb-2">Email</label>
                        <x-text-input id='email' name='email' :required="true" class="w-full" />
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for='message' class="block text-black/70 font-semibold mb-2">Message</label>
                        <textarea name="user_message" id='message' cols="30" rows="6"
                                  class="w-full textarea bg-white border border-gray-300 rounded-lg shadow-sm" required>
                        </textarea>
                        @error('user_message') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <button class="custom-btn w-full" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="md:w-1/2">
                <img src="{{ asset('images/svg2.png') }}" alt="Contact Us" class="w-full max-w-md mx-auto rounded-lg">
            </div>
        </div>
    </div>
</div>
</x-logged-out>
