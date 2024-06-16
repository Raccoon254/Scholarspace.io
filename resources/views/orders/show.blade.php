<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-shopping-bag"></i>
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="flex flex-col text-black/70 gap-4">
                <div class="bg-white rounded-lg shadow-lg mb-4">
                    <div class="flex items-center gap-4 mb-4 md:mb-0">
                        <div class="p-2 md:p-4">
                            <h3 class="text-lg font-semibold text-gray-800">What is an Order?</h3>
                            <p class="text-gray-700 mt-1">
                                An order is a request for our professional services, which can include essay writing,
                                research papers, and more.
                                By placing an order, you ensure that your academic needs are met by our expert team.
                            </p>
                        </div>
                    </div>
                    <div class="p-2 md:px-4 mb-4">
                        <a href="{{ route('orders.create') }}" class="btn btn-primary text-white">
                            Place an Order
                            <i class="fas ring-1 p-2 btn-circle btn-xs center ring-white ring-opacity-35 fa-pen-nib ml-1"></i>
                        </a>
                    </div>
                    <p class="text-gray-800 rounded-b-lg p-2 md:p-6 bg-green-500">
                        When you place an order, you provide us with detailed instructions about your requirements,
                        deadlines, and any additional materials.
                        Our team will match you with the best writer for your subject area to ensure high-quality,
                        plagiarism-free work.
                    </p>
                </div>

                @if(!$orders->isEmpty())
                    <div class="hidden md:flex bg-white p-4 rounded-lg justify-between items-center gap-4">
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

                <div class="hidden md:block bg-white h-full overflow-y-auto p-6 rounded-lg shadow-sm">
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
                                            <span
                                                class="rounded-md grid place-items-center px-2 py-1 {{ $order->getStatusClass() }} text-white">
                                                {{ $order->status }}
                                            </span>
                                    </td>
                                    <td class="flex">
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

                <!-- Explain we have to use a bigger device -->
                <div class="md:hidden bg-white p-4 rounded-lg shadow-sm">
                    <div class="text-black
                        flex flex-col items-center justify-center gap-4">
                        <i class="fas fa-exclamation-triangle text-4xl text-yellow-500"></i>
                        <p class="text-center">
                            Please use a bigger device to view orders.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
