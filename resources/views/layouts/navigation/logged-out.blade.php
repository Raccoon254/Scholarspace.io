<nav class="bg-gray-100">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-black/90">Scholarspace</a>
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('how-it-works') }}" class="text-black/50 hover:text-black">How It Works</a>
                <a href="{{ route('services') }}" class="text-black/50 hover:text-black">Services</a>
                <a href="{{ route('about') }}"
                   class="text-black/50 hover:text-black">About Us</a>
                <a href="{{ route('contact') }}"
                   class="text-black/50 hover:text-black">Contact</a>
                <a href="{{ route('login') }}"
                   class="bg-blue-500 text-white/90 hover:bg-blue-600 font-semibold py-2 px-4 rounded-md">Login</a>
                <a href="{{ route('register') }}"
                   class="bg-green-500 text-black/90 hover:bg-green-600 font-semibold py-2 px-4 rounded-md">Register</a>
            </div>
            <div class="md:hidden">
                <button>
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </div>
</nav>
