<x-logged-out>
    <x-slot:title>
        Price Calculator - Scholarspace
    </x-slot>

    <div class="container text-black/80 mx-auto px-4 py-8">
        <h1 class="text-5xl font-bold mb-4">How the Price Calculator Works</h1>
        <p class="mb-6">The price calculator on Scholarspace is designed to provide an estimate of the cost for your order based on the number of words or pages.</p>
        <ul class="list-disc list-inside mb-6">
            <li><strong>Topic:</strong> Enter the topic of your order.</li>
            <li><strong>Subject:</strong> Select the subject of your order from the dropdown menu.</li>
            <li><strong>Deadline:</strong> Select the deadline for your order.</li>
            <div class="bg-blue-500 p-4 rounded-md text-white">
                <p class="text-xs">
                    <i class="fas fa-exclamation-triangle"></i> <strong>Note: </strong>
                    The price per page may vary depending on the type of order and the deadline.
                </p>
            </div>
            <li><strong>Number of Words/Pages:</strong> Enter the number of words or pages for your order. You can toggle between words and pages.</li>
            <div class="bg-blue-500 p-4 rounded-md text-white">
                <div class="flex mb-2">
                    <button class="px-3 py-2 border bg-green-500 text-white border-gray-200 rounded-l-lg" id="wordsButton">Words</button>
                    <button class="px-3 py-2 border border-gray-200 rounded-r-lg" id="pagesButton">Pages</button>
                </div>
                Currently the rate is {{ env('PRICE_PER_PAGE') ?? '15 USD' }} per page, 275 words per page.
                <p class="text-xs text-red-100 mt-1">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Note:</strong> The price per page may vary depending on the type of order.
                </p>
            </div>
            <li><strong>Calculate Price:</strong> Click this button to calculate the price. A modal will appear showing the total price and order details.</li>
            <li><strong>Create Order:</strong> If you are satisfied with the price, you can click this button to place your order.</li>
        </ul>
        <p class="text-red-600">
            <i class="fas fa-exclamation-triangle"></i>
            Please note that this is an estimate and the final price may vary.
        </p>

        <div class="mt-6">
            <a href="{{ route('home') }}" class="custom-btn">
                Home <i class="fa fa-home"></i>
            </a>
        </div>
    </div>
</x-logged-out>
