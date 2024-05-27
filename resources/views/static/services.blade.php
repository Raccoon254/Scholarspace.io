<x-logged-out>
    <x-slot name="title">
        Our Services
    </x-slot>
    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-black/90 mb-4">Our Academic Writing Services</h1>
            <p class="text-lg text-black/50">Explore our comprehensive range of services tailored to meet your academic needs.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="bg-white rounded-lg shadow-md p-6">
                    <i class="{{ $service['icon'] }} fa-3x text-{{ $service['color'] }} mb-4"></i>
                    <h3 class="text-xl font-bold text-black/90 mb-2">{{ $service['title'] }}</h3>
                    <p class="text-black/50 mb-4">{{ $service['description'] }}</p>
                    <a href="{{ $service['link'] }}" class="text-{{ $service['color'] }} font-semibold hover:underline">Learn More</a>
                </div>
            @endforeach
        </div>
    </div>
</x-logged-out>
