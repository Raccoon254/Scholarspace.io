<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-white">
    <livewire:navbar/>
    <div class="flex relative gap-2 p-2">
        @include('layouts.sidebar')
        <!-- Page Content -->
        <main class="w-full bg-gray-100 overflow-clip rounded-[16px]">
            {{ $slot }}
        </main>
    </div>
</div>
<script src="https://cdn.socket.io/4.7.5/socket.io.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script>
    //Connect to socket.io -- server
    const socket = io('http://localhost:3000');

    socket.on('connectedUsers', (data) => {
        console.log('Connected users:', data);
        Livewire.dispatch('connectedUsers', {onlineUsers: data});
    });

    // Send the username to the server on connection
    let authUser = '{{ auth()->user() }}';
    authUser = JSON.parse(authUser.replace(/&quot;/g, '"'));

    socket.on('connect', () => {
        socket.emit('userConnected', authUser);
        console.log('User connected:', authUser);
    });

    socket.on('disconnect', () => {
        socket.emit('userDisconnected', authUser);
    });
</script>
</body>
</html>
