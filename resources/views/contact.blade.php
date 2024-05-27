<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Scholarspace - Contact Us</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="font-sans min-h-screen bg-gray-50 antialiased">
@include('layouts.navigation.logged-out')
<div class="bg-gray-50 flex items-center">
    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="mb-6 md:mb-0 md:w-1/2">
                <h1 class="text-4xl font-bold text-black/90 mb-4">Contact Us</h1>
                <p class="text-lg text-black/50 mb-6">Have a question or need assistance? Our friendly support team is here to help. Fill out the form below, and we'll get back to you as soon as possible.</p>
                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-black/70 font-semibold mb-2">Name</label>
                        <x-text-input id="name" name="name" :required="true" class="w-full" />
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-black/70 font-semibold mb-2">Email</label>
                        <x-text-input id="email" name="email" :required="true" class="w-full" />
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-black/70 font-semibold mb-2">Message</label>
                        <textarea name="user_message" id="message" cols="30" rows="6" class="w-full textarea bg-white border border-gray-300 rounded-lg shadow-sm" required></textarea>
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
</body>
</html>
