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
        @error('topic') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
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
            <input type="number" id="wordCount" wire:model.live="wordCount" class="flex-grow p-2 border border-gray-300 rounded-lg" placeholder="No of Words/Pages" oninput="calculatePrice()">
            @error('wordCount') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="ml-2 flex">
            <button onclick="setCalculationMode(true)" class="px-3 py-2 border bg-green-500 border-green-500 rounded-l-lg" id="wordsButton">Words</button>
            <button onclick="setCalculationMode(false)" class="px-3 py-2 border border-gray-300 rounded-r-lg" id="pagesButton">Pages</button>
        </div>
    </div>

    <div class="mb-4">
        <div class="text-gray-700 flex gap-4 items-center">
            <span>
                Total Price:
            </span>
            <span class="text-green-500 h-6" id="totalPrice">
                $0.00
            </span>
        </div>
    </div>

    <button wire:click="placeOrder" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg">
        Order Now
    </button>
</div>

<script>
    let isWords = true;

    function setCalculationMode(wordsMode) {
        isWords = wordsMode;
        document.getElementById('wordsButton').classList.toggle('bg-green-500', isWords);
        document.getElementById('wordsButton').classList.toggle('border-green-500', isWords);
        document.getElementById('pagesButton').classList.toggle('bg-green-500', !isWords);
        document.getElementById('pagesButton').classList.toggle('border-green-500', !isWords);
        calculatePrice();
    }

    function calculatePrice() {
        const wordCount = document.getElementById('wordCount').value;
        const pages = isWords ? Math.ceil(wordCount / 275) : wordCount;
        let price = pages * 15;
        if(isWords){
            price = Math.ceil(wordCount*0.054545)
        }
        document.getElementById('totalPrice').innerText = `$${price.toFixed(2)}`;
    }
</script>
