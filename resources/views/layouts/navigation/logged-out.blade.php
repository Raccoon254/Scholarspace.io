<nav class="bg-gray-100">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-black/90">Scholarspace</a>
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('home') }}" class="text-black/50 hover:text-black">Home</a>
                <a href="{{ route('how-it-works') }}" class="text-black/50 hover:text-black">How It Works</a>
                <a href="{{ route('services') }}" class="text-black/50 hover:text-black">Services</a>
                <a href="{{ route('about') }}" class="text-black/50 hover:text-black">About Us</a>
                <a href="{{ route('contact') }}" class="text-black/50 hover:text-black">Contact</a>
                <a href="{{ route('login') }}" class="bg-blue-500 text-white/90 hover:bg-blue-600 font-semibold py-2 px-4 rounded-md">Login</a>
                <a href="{{ route('register') }}" class="bg-green-500 text-black/90 hover:bg-green-600 font-semibold py-2 px-4 rounded-md">Register</a>
            </div>
            <div class="md:hidden">
                <button id="menu-button">
                    <i id="menu-icon" class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <div id="menu" class="md:hidden flex flex-col gap-1 w-full p-1">
            <a href="{{ route('home') }}" class="block py-1 text-black/50 hover:text-black">Home</a>
            <a href="{{ route('how-it-works') }}" class="block py-1 text-black/50 hover:text-black">How It Works</a>
            <a href="{{ route('services') }}" class="block py-1 text-black/50 hover:text-black">Services</a>
            <a href="{{ route('about') }}" class="block py-1 text-black/50 hover:text-black">About Us</a>
            <a href="{{ route('contact') }}" class="block py-1 text-black/50 hover:text-black">Contact</a>
            <a href="{{ route('login') }}" class="block py-1 px-2 bg-blue-500 text-white/90 hover:bg-blue-600 font-semibold rounded-md">Login</a>
            <a href="{{ route('register') }}" class="block py-1 px-2 bg-green-500 text-black/90 hover:bg-green-600 font-semibold rounded-md">Register</a>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('menu-button');
        const menuIcon = document.getElementById('menu-icon');
        const menu = document.getElementById('menu');

        menuButton.addEventListener('click', function () {
            const isOpen = menu.classList.contains('hidden');
            if (isOpen) {
                menu.classList.remove('hidden');
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-times');
            } else {
                menu.classList.add('hidden');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        });

        document.addEventListener('click', function (event) {
            if (!menuButton.contains(event.target) && !menu.contains(event.target)) {
                menu.classList.add('hidden');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        });
    });
</script>
