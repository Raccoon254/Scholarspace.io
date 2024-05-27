<x-logged-out>
    <!-- Title -->
    <x-slot name="title">
        About Us - Scholarspace
    </x-slot>

    <div class="bg-gray-50 min-h-screen">
        <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-8 md:mb-0 md:w-1/2">
                    <h1 class="text-4xl font-bold text-black/90 leading-snug mb-4">About Us</h1>
                    <p class="text-lg text-black/50 mb-8">At Scholarspace, we are dedicated to providing top-notch
                        academic writing services to students worldwide. Our team of experienced writers and editors are
                        committed to delivering high-quality, plagiarism-free content tailored to your specific
                        needs.</p>
                    <p class="text-lg text-black/50 mb-8">With years of experience in the industry, we understand the
                        challenges students face when it comes to balancing coursework, extracurricular activities, and
                        personal commitments. That's why we strive to make the writing process as stress-free as
                        possible for you.</p>
                    <a href="#" class="custom-btn">Learn More</a>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('images/svg1.png') }}" alt="About Us" class="w-full max-w-md mx-auto rounded-lg">
                </div>
            </div>
        </div>

        <div class="bg-gray-100 py-12">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="mb-8 md:mb-0 md:w-1/2">
                        <h2 class="text-3xl font-bold text-black/90 mb-4">Our Core Values</h2>
                        <ul class="text-lg text-black/50 list-disc pl-6">
                            <li class="mb-2">Integrity and honesty in all our dealings</li>
                            <li class="mb-2">Commitment to delivering quality work</li>
                            <li class="mb-2">Respect for academic integrity and plagiarism-free content</li>
                            <li class="mb-2">Timely delivery and excellent customer service</li>
                        </ul>
                    </div>
                    <div class="md:w-1/2">
                        <img src="{{ asset('images/svg2.png') }}" alt="Core Values"
                             class="w-full max-w-md mx-auto rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-logged-out>
