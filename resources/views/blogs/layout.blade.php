<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="google-site-verification" content="lpki7YHn9zLN5Is7lsjRYSzHIXMSiEErVlY6ppajh2o" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-white">
    <div class="z-custom relative w-full bg-white px-4 flex justify-between items-center gap-4">
        <livewire:navbar/>
    </div>
    <livewire:alerts/>
    <div class="flex relative z-40 gap-2 p-2">
        <livewire:sidebar/>
        <!-- Page Content -->
        <main class="w-full bg-gray-100 p-4 text-black/80 overflow-clip rounded-[16px]">
            {{ $slot }}
        </main>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
