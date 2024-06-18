<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-home"></i>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="w-full md:w-2/3 md:pr-2 flex-col">
                <div class="rounded-lg relative p-4 w-full bg-white">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Order</h3>
                    <!-- Order details, title and description -->
                    <div class="flex justify-between items-center mb-2">
                        <div>
                            <h4 class="text-lg font-medium text-gray-900">Order Details</h4>
                            <p class="text-sm text-gray-500">Order ID: {{ $order->id }}</p>
                            <p class="text-sm text-gray-500">Order Date: {{ $order->created_at->format('d M Y') }}</p>
                        </div>
                        <div>
                            <a href="{{ route('orders.show', $order) }}"
                               class="text-blue-500 hover:text-blue-700">View Order</a>
                            <div class="text-xs">
                                <span class="text-gray-500">Total: </span>
                                <span class="text-gray-900 font-medium">${{ $order->total_price }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <h4 class="text-lg font-medium text-gray-900">Description</h4>
                        {{ Str::limit($order->description, 100) }}
                    </div>
                    <form wire:submit.prevent="save">
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">Order Status</label>
                            <select id="status" wire:model="status"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="in-progress">In Progress</option>
                                <option value="completed">Completed</option>
                                <option value="pending">Pending</option>
                            </select>
                            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="paymentStatus" class="block text-sm font-medium text-gray-700">Payment
                                Status</label>
                            <select id="paymentStatus" wire:model="paymentStatus"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="failed">Failed</option>
                            </select>
                            @error('paymentStatus') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit"
                                    class="custom-btn">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
