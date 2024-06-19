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
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-white">
    <livewire:navbar/>
    <livewire:alerts/>
    <div class="flex relative gap-2 p-2">
        <livewire:sidebar/>
        <!-- Page Content -->
        <main class="w-full bg-gray-100 text-black/80 overflow-clip rounded-[16px]">
            {{ $slot }}
        </main>
    </div>
</div>
@include('layouts.footer')
<script src="https://cdn.socket.io/4.7.5/socket.io.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script>
    //Get socket.io server from the .env file
    const socketServer = '{{ env('SOCKET_URL') }}';

    //Connect to socket.io -- server
    const socket = io(socketServer);

    socket.on('connectedUsers', (data) => {
        Livewire.dispatch('connectedUsers', {onlineUsers: data});
    });

    // Send the username to the server on connection
    let authUser = '{{ auth()->user() }}';
    authUser = JSON.parse(authUser.replace(/&quot;/g, '"'));

    socket.on('connect', () => {
        socket.emit('userConnected', authUser);
    });

    socket.on('disconnect', () => {
        socket.emit('userDisconnected', authUser);
    });

    socket.on('receiveMessage', (message) => {
        Livewire.dispatch('messagesSent');
        Livewire.dispatch('received-message');
        // Play notification sound
        const audio = new Audio('/sounds/message-alert.mp3');
        audio.play();
    });

    socket.on('typing', (from) => {
        showTypingStatus(from);
    });

    function showTypingStatus(userId) {
        // Logic to display typing status on the UI
        const typingElement = document.getElementById('typingStatus')
        typingElement.innerText = 'Typing...'

        // Hide typing status after a short delay
        setTimeout(() => {
            typingElement.innerText = ''
        }, 2000);
    }

</script>
</body>
</html>
