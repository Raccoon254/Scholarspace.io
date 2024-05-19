<div class="bg-white p-4 relative text-black/80 rounded-lg shadow-sm">
    <!-- About icon -->
    <a href="#" class="absolute top-0 right-0 bg-blue-500 text-white p-2 rounded-bl-lg rounded-tr-lg hover:bg-blue-600">
        <i class="fas h-4 w-4 center fa-info-circle"></i>
    </a>

    <h3 class="text-xl font-semibold mb-6 text-center">Order Price Calculator</h3>

    <div class="mb-4">
        <input type="text" wire:model="topic" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Topic">
    </div>

    <div class="mb-4">
        <select wire:model="subject" class="w-full p-2 border border-gray-300 rounded-lg">
            <option value="" selected>
                Select Subject
            </option>
            @foreach($subjects as $subject)
                <option value="{{ $subject }}">{{ $subject }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <input type="date" wire:model.live="deadline" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Deadline">
    </div>

    <div class="mb-4 flex items-center">
        <input type="number" wire:model.live="wordCount" class="flex-grow p-2 border border-gray-300 w-1/2 rounded-lg" placeholder="No of {{ $isWords ? 'Words' : 'Pages' }}">
        <div class="ml-2 flex">
            <button wire:click="$set('isWords', true)" class="px-3 py-2 border {{ $isWords ? 'bg-green-500 text-white border-green-500' : 'border-gray-300' }} rounded-l-lg">Words</button>
            <button wire:click="$set('isWords', false)" class="px-3 py-2 border {{ !$isWords ? 'bg-green-500 text-white border-green-500' : 'border-gray-300' }} rounded-r-lg">
                Pages
            </button>
        </div>
    </div>

    <div class="mb-4">
        <div class="text-gray-700 flex gap-4 items-center">
            <span>
                Total Price:
            </span>
            <span class="text-green-500 h-6">
                <!-- If the price is less than 1 show a loading spinner -->
                @if ($calculated_price < 0.01)
                    <span class="loading loading-spinner loading-md"></span>
                @else
                    ${{ number_format($calculated_price, 2) }}
                @endif
            </span>
        </div>
    </div>

    <button wire:click="placeOrder" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg">
        Order Now
    </button>
</div>
