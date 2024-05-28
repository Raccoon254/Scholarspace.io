<x-logged-out>
    <x-slot name="title">
        How It Works
    </x-slot>

    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-black/90 mb-4">How Our Writing Service Works</h1>
            <p class="text-lg text-black/50">Follow these simple steps to get your academic writing needs covered.</p>
        </div>

        <div class="flex flex-col md:flex-row md:justify-center" data-aos="fade-up"
             data-aos-delay="200">
            <div class="md:w-1/2">
                <ol class="space-y-14">
                    @foreach($steps as $step)
                        <li class="ring-1 ring-gray-100 shadow-md p-3 rounded-2xl" data-aos="fade-up" data-aos-delay="100">
                            <div class="flex items-center">
                                <div
                                    class="flex items-center justify-center ring ring-inset ring-{{ $step['color'] }} w-12 h-12 bg-gray-100 text-{{ $step['color'] }}-500 rounded-full mr-4">
                                    <i class="{{ $step['icon'] }} text-{{ $step['color'] }}"></i>
                                </div>
                                <h3 class="text-xl font-bold text-black/90">{{ $step['title'] }}</h3>
                            </div>
                            <div class="pl-16 space-y-4">
                                <p class="text-black/50">{{ $step['description'] }}</p>
                                <button class="custom-btn-ghost bg-gray-200 min-w-20">
                                    Learn More
                                    <i class="fas fa-arrow-right text-{{ $step['color'] }}-500"></i>
                                </button>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
            <div class="md:w-1/2 md:pr-8 mb-8 md:mb-0" data-aos="fade-left" data-aos-delay="900">
                <img src="{{ asset('images/svg3.png') }}" alt="How It Works" class="w-full max-w-md mx-auto rounded-lg">
            </div>
        </div>
    </div>
</x-logged-out>
