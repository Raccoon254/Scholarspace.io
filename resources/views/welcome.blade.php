<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/af6aba113a.js" crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased">
<div class="bg-gray-50">
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex px-1 sm:px-4 lg:px-8 flex-col md:flex-row items-center justify-between">
            <div class="text-center md:text-left">
                <h1 class="text-4xl font-bold text-black/90 mb-4">Welcome to Scholarspace</h1>
                <p class="text-lg text-black/50 mb-8">Your trusted platform for assignment help.</p>
                <div class="flex justify-center md:justify-start">
                    <a href="{{ route('login') }}"
                       class="bg-blue-500 text-white/90 hover:bg-blue-600 font-semibold py-2 px-4 rounded-md mr-4">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-green-500 text-black/90 hover:bg-green-600 font-semibold py-2 px-4 rounded-md">
                        Register
                    </a>
                </div>
            </div>
            <div class="mt-8 md:mt-0">
                <img src="{{ asset('images/svg2.png') }}" alt="Hero" class="w-full max-w-md mx-auto rounded-lg">
            </div>
        </div>
    </div>

    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-black/90 mb-4">How It Works</h2>
            <p class="text-lg text-black/50">Our simple and efficient process for getting your assignments done.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
             $colors = ['text-blue-500', 'text-green-500', 'text-yellow-500', 'text-red-500'];
            @endphp
            @foreach($process_steps as $item)
                <div class="bg-white rounded-lg shadow-md shadow-gray-200 p-6">
                    <i class="{{ $item['icon'] }} fa-3x {{ $colors[$loop->index % 4] }} mb-4"></i>
                    <h3 class="text-xl font-bold text-black/90 mb-2">{{ $item['title'] }}</h3>
                    <p class="text-black/50">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <div class="bg-gray-100 py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-8 md:mb-0">
                    <img src="{{ asset('images/svg1.png') }}" alt="Writing"
                         class="w-full max-w-md mx-auto rounded-lg">
                </div>
                <div class="text-center md:text-left md:ml-8">
                    <h2 class="text-3xl font-bold text-black/90 mb-4">Professional Writers</h2>
                    <p class="text-lg text-black/50 mb-6">Our team of experienced writers have expertise in various
                        academic disciplines, ensuring you receive high-quality and well-researched assignments.</p>
                    <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Learn
                        More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-black/90 mb-4">Trusted by Students</h2>
            <p class="text-lg text-black/50">Hear what our satisfied clients have to say about Scholarspace.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center mb-4">
                        <img src="{{ asset($testimonial['avatar']) }}" alt="Avatar"
                             class="w-12 h-12 rounded-full object-cover mr-4"
                             style="border: 2px solid {{ $testimonial['color'] }}">
                        <div>
                            <h4 class="text-lg font-bold text-black/90">{{ $testimonial['name'] }}</h4>
                            <p class="text-black/50">{{ $testimonial['subject'] }}</p>
                        </div>
                    </div>
                    <p class="text-black/50">"{{ $testimonial['testimonial'] }}"</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
