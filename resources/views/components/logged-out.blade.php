<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ $title ?? 'Scholarspace' }}
    </title>
    <meta name="google-site-verification" content="lpki7YHn9zLN5Is7lsjRYSzHIXMSiEErVlY6ppajh2o" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>
<body class="font-sans text-black/80 min-h-screen flex justify-between flex-col bg-gray-50 antialiased">
@include('layouts.navigation.logged-out')
@include('session.alerts')
{{ $slot }}
@include('layouts.footer')
</body>
</html>
