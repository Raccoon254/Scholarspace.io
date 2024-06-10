<x-logged-out>
    <x-slot name="title">
        Coming Soon - Scholarspace
    </x-slot>

    <div class="container text-black/80 mx-auto px-4 py-8 md:py-10">
        <h1 class="text-5xl text-blue-500 font-bold mb-4">Coming Soon!</h1>
        <p class="mb-6">Our developers are working hard to put together the remaining parts of the website.</p>
        <p class="mb-4">Please check back later. We appreciate your patience and understanding.</p>
        <a href="{{ route('home') }}" class="custom-btn">
            Home <i class="fa fa-home"></i>
        </a>
    </div>
</x-logged-out>
