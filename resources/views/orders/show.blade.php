<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-shopping-bag"></i>
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="flex flex-col h-[85vh] text-black/70  gap-4">
                @if(!$orders->isEmpty())
                    <div class="flex bg-white p-4 rounded-lg justify-between items-center gap-4">
                        <div class="flex gap-4">
                            <div class="relative">
                                <input type="text" wire:model.live.debounce="search"
                                       class="p-2 pl-8 border border-gray-300 rounded-md"
                                       placeholder="Search Orders">
                                <i class="fas fa-search absolute top-[13px] left-3 text-gray-700"></i>
                            </div>
                            <button wire:click="resetFilters"
                                    class="p-2 px-4 bg-gray-200 text-gray-700 font-semibold rounded-lg">
                                <i class="fas fa-filter"></i>
                                Filter
                            </button>
                            <div class="border border-gray-300 rounded-md center gap-3 p-2">
                                <i class="fas fa-calendar left-3 text-gray-700"></i>
                                01 Jan - 04 Jan
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <button wire:click="exportOrders"
                                    class="p-2 px-4 bg-blue-500 text-white font-semibold rounded-md">
                                <i class="fas mr-2 fa-file-download"></i>
                                Download as CSV
                            </button>
                        </div>
                    </div>
                @endif

                <div class="bg-white h-full overflow-y-auto p-6 rounded-lg shadow-sm">
                    @if($orders->isEmpty())
                        <div class="text-black/90 h-full center flex-col">
                            <i class="fas fa-box-open text-4xl mb-2"></i>
                            @if($search)
                                <span>
                                    No orders found for "{{ $search }}"
                                    <button class="custom-btn" wire:click="resetFilters">
                                        <i class="fas fa-sync-alt"></i>
                                        Reset Search
                                    </button>
                                @else
                                        You haven't placed any orders yet.
                                        @if($role === 'client')
                                            <a href="{{ route('orders.create') }}" class="custom-btn">
                                                        Place an order
                                                    </a>
                                        @endif
                                    @endif
                                </span>
                        </div>
                    @else
                            <table class="table my-4 ring-1 ring-gray-50 rounded-md overflow-clip">
                                <thead>
                                <tr class="border-gray-100">
                                    @foreach(['title' => 'Orders', 'description' => 'Description', 'total_price' => 'Total Price', 'status' => 'Status'] as $field => $label)
                                        <th onselectstart="return false"
                                            class="text-black/80 text-[14px] cursor-pointer"
                                            wire:click="sortBy('{{ $field }}')">
                                            {{ $label }}
                                            <i class="fas {{ $this->getSortIcon($field) }}"></i>
                                        </th>
                                    @endforeach
                                    <th class="text-black/80 text-[14px]">Payment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr class="border-b border-gray-100">
                                        <td class="">{{ $order->title }}</td>
                                        <td class="">{{ $order->description }}</td>
                                        <td class="">$ {{ $order->total_price }}</td>
                                        <td class="">
                                            <span class="rounded-md grid place-items-center px-2 py-1 {{ $order->getStatusClass() }} text-white">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td class="">
                                            <span
                                                class="rounded-md place-items-center px-2 py-1 {{ $order->isPaid() ? $order->payment->getStatusClass() : 'bg-red-500' }} text-white">
                                                {{ $order->isPaid() ? $order->payment->status : 'Not Paid' }}
                                            </span>
                                            <!-- Show payment button if order is not paid -->
                                            @if(!$order->isPaid())
                                                <button wire:click="payOrder({{ $order->id }})"
                                                        class="p-2 mx-4 px-4 bg-blue-500 text-white font-semibold rounded-md">
                                                    Pay
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $orders->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
