<x-logged-out>
    <x-slot name="title">
        How It Works
    </x-slot>

    <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-black/90 mb-4">How Our Writing Service Works</h1>
            <p class="text-lg text-black/50">Follow these simple steps to get your academic writing needs covered.</p>
        </div>

        <div class="flex flex-col md:flex-row md:items-center md:justify-center">
            <div class="md:w-1/2">
                <ol class="space-y-6">
                    <li>
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-12 h-12 bg-blue-100 text-blue-500 rounded-full mr-4">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <h3 class="text-xl font-bold text-black/90">Place Your Order</h3>
                        </div>
                        <p class="text-black/50 ml-16">Start by filling out our secure order form with detailed instructions, deadline, and any additional requirements for your paper.</p>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-12 h-12 bg-green-100 text-green-500 rounded-full mr-4">
                                <i class="fas fa-user-edit"></i>
                            </div>
                            <h3 class="text-xl font-bold text-black/90">Writer Assignment</h3>
                        </div>
                        <p class="text-black/50 ml-16">Our team of expert writers will review your order, and we'll assign the most qualified writer based on their expertise and subject area.</p>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-12 h-12 bg-yellow-100 text-yellow-500 rounded-full mr-4">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h3 class="text-xl font-bold text-black/90">Writing Process</h3>
                        </div>
                        <p class="text-black/50 ml-16">Your assigned writer will conduct in-depth research and craft a well-written, plagiarism-free paper tailored to your requirements. They will follow your instructions and adhere to academic standards.</p>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-12 h-12 bg-red-100 text-red-500 rounded-full mr-4">
                                <i class="fas fa-check-double"></i>
                            </div>
                            <h3 class="text-xl font-bold text-black/90">Quality Assurance</h3>
                        </div>
                        <p class="text-black/50 ml-16">Our rigorous quality assurance process ensures that your paper meets the highest standards before delivery. This includes proofreading, formatting, and compliance with your instructions.</p>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-12 h-12 bg-purple-100 text-purple-500 rounded-full mr-4">
                                <i class="fas fa-download"></i>
                            </div>
                            <h3 class="text-xl font-bold text-black/90">Delivery and Support</h3>
                        </div>
                        <p class="text-black/50 ml-16">Your completed paper will be delivered to you before the deadline, and our support team is available 24/7 to assist you with any questions or concerns.</p>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-12 h-12 bg-orange-100 text-orange-500 rounded-full mr-4">
                                <i class="fas fa-sync-alt"></i>
                            </div>
                            <h3 class="text-xl font-bold text-black/90">Revisions (if needed)</h3>
                        </div>
                        <p class="text-black/50 ml-16">We offer unlimited revisions to ensure your complete satisfaction with the final product. If you need any changes or adjustments, simply request a revision, and we'll take care of it.</p>
                    </li>
                </ol>
            </div>
            <div class="md:w-1/2 md:pr-8 mb-8 md:mb-0">
                <img src="{{ asset('images/svg3.png') }}" alt="How It Works" class="w-full max-w-md mx-auto rounded-lg">
            </div>
        </div>
    </div>
</x-logged-out>
