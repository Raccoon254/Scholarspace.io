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
                @guest
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white/90 hover:bg-blue-600 font-semibold py-2 px-4 rounded-md">Login</a>
                    <a href="{{ route('register') }}" class="bg-green-500 text-black/90 hover:bg-green-600 font-semibold py-2 px-4 rounded-md">Register</a>
                @endguest

                @auth
                    <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white/90 hover:bg-blue-600 font-semibold py-2 px-4 rounded-md">Dashboard</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white/90 hover:bg-red-600 font-semibold py-2 px-4 rounded-md">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
            <div class="md:hidden">
                <button class="text-blue-500" id="menu-button">
                    <i id="menu-icon" class="fas fa-bars"></i>
                </button>
            </div>
        </div>
        <div id="menu" class="md:hidden hidden flex-col gap-1 mt-4 w-full p-1">
            <div class="mb-4 text-black/80 text-lg font-semibold">
                Navigation Links
            </div>
            <a href="{{ route('home') }}" class="block bg-gray-50 mb-2 px-4 rounded-md py-2 border-blue-200 border text-black/50 hover:text-black">Home</a>
            <a href="{{ route('how-it-works') }}" class="block bg-gray-50 mb-2 px-4 rounded-md py-2 border-blue-200 border text-black/50 hover:text-black">How It Works</a>
            <a href="{{ route('services') }}" class="block bg-gray-50 mb-2 px-4 rounded-md py-2 border-blue-200 border text-black/50 hover:text-black">Services</a>
            <a href="{{ route('about') }}" class="block bg-gray-50 mb-2 px-4 rounded-md py-2 border-blue-200 border text-black/50 hover:text-black">About Us</a>
            <a href="{{ route('contact') }}" class="block bg-gray-50 mb-2 px-4 rounded-md py-2 border-blue-200 border text-black/50 hover:text-black">Contact</a>
            @guest
                <a href="{{ route('login') }}" class="flex items-center gap-2 py-2 mb-2 px-4 bg-blue-500 text-white/90 hover:bg-blue-600 font-semibold rounded-md">
                    Login <i class="fas fa-user-circle"></i>
                </a>
                <a href="{{ route('register') }}" class="flex items-center gap-2 py-2 px-4 bg-green-500 text-black/90 hover:bg-green-600 font-semibold rounded-md">
                    Register <i class="fas fa-arrow-right"></i>
                </a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 py-2 mb-2 px-4 bg-blue-500 text-white/90 hover:bg-blue-600 font-semibold rounded-md">
                    Dashboard <i class="fas fa-home"></i>
                </a>
                <form class="w-full" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-2 py-2 px-4 bg-red-500 text-white/90 hover:bg-red-600 font-semibold rounded-md">
                        Logout <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            @endauth
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
