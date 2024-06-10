<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-home"></i>
            {{ __('Create Order') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl text-black/80 relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="w-full md:w-2/3 md:pr-2 flex-col">
                <div class="rounded-lg relative p-4 w-full bg-white">
                    <h1 class="text-3xl font-bold mb-6">Create Order</h1>

                    <form method="POST" action="">
                        @csrf

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
                            <x-text-input type="text" name="title" id="title" class="w-full"
                                          value="{{ $orderData['title'] ?? '' }}"/>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
                            <textarea name="description" id="description"
                                      class="border border-gray-300 rounded-lg w-full"
                                      rows="3">{{ $orderData['description'] ?? '' }}</textarea>
                        </div>

                        @php
                            $totalPrice = $orderData['total_price'] ?? 0;
                        @endphp
                        <div class="mb-4">
                            <label for="total_price" class="block text-gray-700 font-bold mb-2">Total Price</label>
                            <x-text-input type="number" name="total_price" id="total_price" class="w-full"
                                          value="{{ $totalPrice }}" readonly/>
                        </div>

                        <button type="submit"
                                class="custom-btn">
                            Create Order
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
