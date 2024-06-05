<div class="bg-white p-4 relative text-black/80 rounded-lg shadow-sm">
    <!-- About icon -->
    <a href="#" class="absolute top-0 right-0 bg-blue-500 text-white p-2 rounded-bl-lg rounded-tr-lg hover:bg-blue-600">
        <i class="fas h-4 w-4 center fa-info-circle"></i>
    </a>

    <h3 class="text-xl font-semibold mb-6 text-center">
        Order Price Calculator
    </h3>

    <div class="mb-4">
        <input type="text" id="topic" wire:model="topic" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Topic">
        @error('topic') <span class="text-xs text-red-500">{{ $message }}</span>@enderror
    </div>

    <div class="mb-4">
        <select id="subject" wire:model="subject" class="w-full p-2 border border-gray-300 rounded-lg">
            <option value="" selected>
                Select Subject
            </option>
            @foreach($subjects as $subject)
                <option value="{{ $subject }}">{{ $subject }}</option>
            @endforeach
        </select>
        @error('subject') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <input type="date" id="deadline" wire:model.live="deadline" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Deadline">
        @error('deadline') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4 flex items-center">
        <div class="flex flex-col w-full">
            <input type="number" id="wordCount" wire:model.live="word_count" class="flex-grow p-2 border border-gray-300 rounded-lg" placeholder="No of Words/Pages">
            @error('wordCount') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="ml-2 flex">
            <button wire:click="setCalculationMode(true)" class="px-3 py-2 border bg-green-500 border-green-500 rounded-l-lg" id="wordsButton">Words</button>
            <button wire:click="setCalculationMode(false)" class="px-3 py-2 border border-gray-300 rounded-r-lg" id="pagesButton">Pages</button>
        </div>
    </div>

    <div class="mb-4">
        <div class="text-gray-700 flex gap-4 items-center">
            <span>
                Total Price:
            </span>
            <span class="text-green-500 h-6" id="totalPrice">
                ${{ number_format($totalPrice, 2) }}
            </span>
        </div>
    </div>

    <button wire:click="showPriceModal" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg">
        Calculate Price
    </button>
</div>

<!-- Modal -->
@if($showModal)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="bg-white p-6 rounded-lg shadow-lg relative w-full max-w-md">
                <h3 class="text-lg font-semibold mb-4">Order Price</h3>
                <p>Total Price: ${{ number_format($totalPrice, 2) }}</p>
                <p>Topic: {{ $topic }}</p>
                <p>Subject: {{ $subject }}</p>
                <p>Word Count: {{ $word_count }}</p>
                <button wire:click="placeOrder" class="w-full py-2 mt-4 bg-green-500 text-white font-semibold rounded-lg">
                    Create Order
                </button>
                <button wire:click="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">
                    &times;
                </button>
            </div>
        </div>
    </div>
@endif

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('toggleWordMode', mode => {
            document.getElementById('wordsButton').classList.toggle('bg-green-500', mode);
            document.getElementById('wordsButton').classList.toggle('border-green-500', mode);
            document.getElementById('pagesButton').classList.toggle('bg-green-500', !mode);
            document.getElementById('pagesButton').classList.toggle('border-green-500', !mode);
        });
    });
</script>
