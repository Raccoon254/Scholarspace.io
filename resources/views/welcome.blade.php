<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body class="font-sans antialiased">
@include('layouts.navigation.logged-out')
<div class="bg-gray-50">
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="flex px-1 sm:px-4 lg:px-8 flex-col md:flex-row items-center justify-between">
            <div class="text-center w-2/3 relative md:text-left">
                <img src="{{ asset('images/svg2.png') }}" alt="Hero"
                     class="w-64 -top-16 opacity-50 right-0 absolute rounded-lg">
                <div class="top-0 left-0 w-full h-full flex flex-col justify-center">
                    <section class="text-center mb-4 md:text-left">
                        <header class="mb-4">
                            <h1 class="text-4xl font-bold text-black/90 leading-snug">
                                Premium <span class="text-red-500">Essay Writing</span> <br> Services for College
                                Students
                            </h1>
                        </header>
                        <p class="text-lg text-black/50 leading-relaxed">
                            Struggling with essays? Our <span
                                class="font-semibold text-blue-500">professional writers</span> are here to help. <br>
                            We offer <span class="font-semibold text-green-500">top-notch, plagiarism-free essays</span>
                            tailored to your needs. Choose us for <span class="font-semibold text-yellow-500">quality and punctuality</span>.
                            Experience a stress-free academic life with Scholarspace.
                        </p>
                    </section>
                    <div class="flex justify-center mt-4 md:justify-start">
                        <a href="{{ route('login') }}"
                           class="bg-blue-500 text-white/90 hover:bg-blue-600 font-semibold py-2 pl-2 rounded-lg mr-4">
                            Solve my paper
                            <span class="mx-2 rounded-md bg-white bg-opacity-20 btn-ghost btn btn-square btn-sm">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 md:mt-0">
                <livewire:PriceCalculator/>
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
                <div class="bg-white rounded-lg shadow-md shadow-gray-200 p-6 hover:scale-105 transition cursor-pointer hover:ring ring-gray-300">
                    <i class="{{ $item['icon'] }} fa-3x {{ $colors[$loop->index % 4] }} mb-4"></i>
                    <h3 class="text-xl font-bold text-black/90 mb-2">{{ $item['title'] }}</h3>
                    <p class="text-black/50">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
        <div class="text-black/80 text-center mt-8">
            For more detailed information, visit our <a href="{{ route('how-it-works') }}" class="text-blue-500 hover:underline">How It Works</a>
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
                        More
                    </a>
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
                <div class="bg-white rounded-lg shadow-md p-6 hover:scale-105 transition cursor-pointer hover:ring ring-gray-300">
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

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Scholarspace</h3>
                    <p class="text-sm text-gray-300">We offer premium essay writing services for college students. Our
                        professional writers are here to help you with your assignments.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                    <ul class="text-sm">
                        <li><a href="#" class="hover:text-blue-500">Home</a></li>
                        <li><a href="#" class="hover:text-blue-500">How It Works</a></li>
                        <li><a href="#" class="hover:text-blue-500">Services</a></li>
                        <li><a href="#" class="hover:text-blue-500">About Us</a></li>
                        <li><a href="#" class="hover:text-blue-500">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                    <p class="text-sm flex gap-4 items-center mb-1 text-gray-300">
                        <i class="fas fa-map-marker"></i>
                        109 Nairobi [Kenya]
                    </p>
                    <p class="text-sm flex gap-4 items-center mb-1 text-gray-300">
                        <i class="fas fa-phone"></i>
                        254758481320
                    </p>
                    <p class="text-sm flex gap-4 items-center mb-1 text-gray-300"> <i class="fas fa-envelope"></i>
                        <a href="mailto:tomsteve187@gmail.com" class="hover:text-blue-500">hello@scholarspace.io</a>
                    </p>
                    <p class="text-sm flex gap-4 items-center mb-1 text-gray-300">
                        <i class="fas fa-clock"></i>
                        Available 24/7
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>
