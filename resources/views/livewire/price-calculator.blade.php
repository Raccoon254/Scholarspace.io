<div class="bg-white p-6 relative text-black/80 rounded-lg shadow-lg">
    <!-- About icon -->
    <a href="#" class="absolute top-0 right-0 bg-blue-500 text-white p-2 rounded-bl-lg rounded-tr-lg hover:bg-blue-600">
        <i class="fas h-6 w-6 center fa-info-circle"></i>
    </a>
    <h3 class="text-lg font-semibold mb-4 text-center">Calculate Order Price</h3>

    <div class="mb-4">
        <input type="text" wire:model="topic" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Topic">
    </div>

    <div class="mb-4">
        <select wire:model="subject" class="w-full p-2 border border-gray-300 rounded-lg">
            <option value="" disabled selected>Select Subject</option>
            <option value="math">Math</option>
            <option value="science">Science</option>
            <option value="history">History</option>
        </select>
    </div>

    <div class="mb-4">
        <input type="date" wire:model="deadline" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Deadline">
    </div>

    <div class="mb-4 flex items-center">
        <input type="number" wire:model="wordCount" class="flex-grow p-2 border border-gray-300 rounded-lg" placeholder="No of words">
        <div class="ml-2 flex">
            <button wire:click="$set('isWords', true)" class="px-4 py-2 border {{ $isWords ? 'bg-green-500 text-white border-green-500' : 'border-gray-300' }} rounded-l-lg">Words</button>
            <button wire:click="$set('isWords', false)" class="px-4 py-2 border {{ !$isWords ? 'bg-green-500 text-white border-green-500' : 'border-gray-300' }} rounded-r-lg">Pages</button>
        </div>
    </div>

    <div class="mb-4">
        <p class="text-gray-700">Total Price: <span class="text-green-500">${{ number_format($price, 2) }}</span></p>
    </div>

    <button wire:click="calculatePrice" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg">
        Order Now
    </button>
</div>
