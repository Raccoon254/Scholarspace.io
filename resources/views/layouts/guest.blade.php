<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
        <meta name="google-site-verification" content="lpki7YHn9zLN5Is7lsjRYSzHIXMSiEErVlY6ppajh2o" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    </head>
    <body class="font-sans text-gray-900 antialiased">
    @include('layouts.navigation.logged-out')
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-10 mb-6 sm:mb-10 bg-gray-100">
            <div class="center flex-col">
                <a href="/">
                    <x-application-logo class="w-16 h-16 fill-current text-gray-500" />
                </a>
                <div class="text-2xl mt-3 font-bold text-gray-700">
                    Scholarspace
                </div>
            </div>

            <div class="w-full flex flex-col sm:max-w-md mt-6 mb-6 px-6 py-4 overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

            @include('layouts.footer')
        </div>
    </body>
</html>
