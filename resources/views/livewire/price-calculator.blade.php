<div class="bg-white p-4 relative text-black/80 rounded-lg shadow-sm">
    <!-- About icon -->
    <a href="{{ route('info.price-calculator') }}"
       class="absolute top-0 right-0 bg-blue-500 text-white p-2 rounded-bl-lg rounded-tr-lg hover:bg-blue-600">
        <i class="fas h-4 w-4 center fa-info-circle"></i>
    </a>

    <h3 class="text-xl font-semibold mb-6 text-center">
        Order Price Calculator
    </h3>

    <p class="mb-4">
        Fill in the details below to calculate <br> the price of your order.
    </p>

    <form wire:submit.prevent="showPriceModal">
        <div class="relative mb-3">
            <input type="text" id="topic" wire:model="topic" class="w-full p-2 border border-gray-300 rounded-lg"
                   placeholder="Topic">
            @error('topic') <span class="text-[10px] absolute left-2 top-[1px] text-red-500">{{ $message }}</span>@enderror
        </div>

        <div class="relative mb-3">
            <select id="subject" wire:model="subject" class="w-full p-2 border border-gray-300 rounded-lg">
                <option value="" selected>
                    Select Subject
                </option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject }}">{{ $subject }}</option>
                @endforeach
            </select>
            @error('subject') <span class="text-[10px] absolute left-2 top-[1px] text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="relative mb-3">
            <input type="date" id="deadline" wire:model.live="deadline"
                   class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Deadline">
            @error('deadline') <span class="text-[10px] absolute left-2 top-[1px] text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3 relative flex items-center">
            <div class="flex flex-col w-full">
                <input type="number" id="wordCount" wire:model.live="word_count"
                       class="flex-grow p-2 border border-gray-300 rounded-lg" placeholder="No of Words/Pages">
                @error('word_count') <span class="text-[10px] absolute left-2 top-[1px] text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="ml-2 flex">
                <button wire:click="setCalculationMode(true)" class="px-3 py-2 border {{ $isWords ? 'bg-green-500 text-white border-green-500' : 'border-gray-300' }}
            rounded-l-lg" id="wordsButton">Words
                </button>
                <button wire:click="setCalculationMode(false)" class="px-3 py-2 border {{ $isWords ? 'border-gray-300' : 'bg-green-500 text-white border-green-500' }}
            rounded-r-lg" id="pagesButton">Pages
                </button>
            </div>
        </div>

        <div class="relative mb-3">
            <div class="text-gray-700 flex gap-4 items-center">
            <span>
                Total Price:
            </span>
                @if($price < 1)
                    <span class="loading loading-spinner h-6"></span>
                    <span>Calculating...</span>
                @else
                    <span class="text-green-500 h-6" id="totalPrice">
                ${{ number_format($price, 2) }}
            </span>
                @endif
            </div>
        </div>

        <button class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg">
            Calculate Price
        </button>
    </form>

<dialog id="order_creation_modal" class="modal bg-black/50 backdrop-blur-sm" {{ $showModal ? 'open' : '' }}>
    <div class="modal-box bg-white p-6">
        <form method="dialog">
            <button class="btn btn-sm ring-1 ring-gray-600 ring-inset btn-circle btn-ghost absolute right-2 top-2">
                <i class="fas fa-times"></i>
            </button>
        </form>
        <h3 class="text-lg sm:text-2xl font-semibold mb-4">
            Order Price
        </h3>
        <table class="table-auto w-full mb-4">
            <tbody>
                <tr class="border-b">
                    <td class="py-2"><i class="mr-2 fas fa-tag"></i> Total Price:</td>
                    <td class="py-2">${{ number_format($totalPrice, 2) }}</td>
                </tr>
                <tr class="border-b">
                    <td class="py-2"><i class="mr-2 fas fa-book"></i> Topic:</td>
                    <td class="py-2">{{ $topic }}</td>
                </tr>
                <tr class="border-b">
                    <td class="py-2"><i class="mr-2 fas fa-bookmark">

                        </i> Subject:</td>
                    <td class="py-2">{{ $subject }}</td>
                </tr>
                <tr class="border-b">
                    <td class="py-2"><i class="mr-2 fas fa-file-word"></i> Word Count:</td>
                    <td class="py-2">{{ $word_count }}</td>
                </tr>
                <tr class="border-b">
                    <td class="py-2"><i class="mr-2 fas fa-calendar-alt"></i> Deadline:</td>
                    <td class="py-2">{{ $deadline }}</td>
                </tr>
            </tbody>
        </table>
        <p class=" bg-blue-500 rounded p-2 text-white text-sm">
            <i class="fas fa-info-circle"></i> Please review your order details before proceeding. Once you click "Create Order", you will be redirected to the order creation page.
        </p>
        <button wire:click="placeOrder" class="w-full py-2 mt-4 bg-green-500 text-white font-semibold rounded-lg">
            Create Order
        </button>
    </div>
</dialog>

</div>
