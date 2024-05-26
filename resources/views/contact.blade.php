<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', 'Scholarspace|contact us page')
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body class="font-sans antialiased">
@include('layouts.navigation.logged-out')
<div class="bg-gray-50 h-[90vh]">
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex px-1 sm:px-4 lg:px-8 flex-col md:flex-row items-center justify-between">
            <h1 class="text-4xl font-bold text-black/90 leading-snug">
                Contact Us
            </h1>
            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <x-text-input :name="'name'" :required="true"/>
                </div>
                <div>
                    <label for="email">Email</label>
                    <x-text-input :name="'email'" :required="true"/>
                </div>
                <div>
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="6" class="w-full textarea bg-white border border-gray-300 rounded-lg shadow-sm"></textarea>
                </div>
                <div class="mt-4">
                    <button class="custom-btn w-full" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
