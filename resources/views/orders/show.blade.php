<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-shopping-bag"></i>
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="flex flex-col relative text-black/70 gap-4">
                <!-- Place order section -->
                <div wire:loading.class="opacity-20" class="bg-green-500  {{ $show_place_order_section ? 'hidden' : ''}} relative border border-green-500 rounded-lg">
                    <div class="bg-white md:pb-3 rounded-lg">
                        <div class="btn btn-ghost border-2 rounded-md border-red-400 absolute right-2 top-2 btn-sm {{ $show_place_order_section ? 'hidden' : ''}}"
                             wire:click="togglePlaceOrderSection">
                            Hide Section
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="flex items-center gap-4 mb-4 md:mb-0">
                            <div class="p-2 md:p-4">
                                <h3 class="text-xl font-semibold text-gray-800">
                                    Place an Order
                                </h3>
                                <p class="text-gray-700 mt-1">
                                    An order is a request for our professional services, which can include essay writing,
                                    research papers, and more.
                                    By placing an order, you ensure that your academic needs are met by our expert team.
                                </p>
                            </div>
                        </div>
                        <div class="p-2 md:px-4">
                            <a href="{{ route('orders.create') }}" class="btn btn-primary text-white">
                                Place an Order
                                <i class="fas ring-1 p-2 btn-circle btn-xs center ring-white ring-opacity-35 fa-pen-nib ml-1"></i>
                            </a>
                        </div>
                    </div>
                    <p class="text-gray-800 text-xs rounded-b-lg p-2 md:p-4 bg-green-500">
                        When you place an order, you provide us with detailed instructions about your requirements,
                        deadlines, and any additional materials.
                        Our team will match you with the best writer for your subject area to ensure high-quality,
                        plagiarism-free work.
                    </p>
                </div>
                <!-- Toggle place order section -->
                <div class="flex justify-end {{ $show_place_order_section ? '' : 'hidden' }}">
                    <div class="btn btn-ghost border-2 rounded-md border-green-500 btn-sm"
                         wire:click="togglePlaceOrderSection">
                        Show Section
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <!-- Loading spinner -->
                <div class="center absolute top-28 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <div wire:loading class="loading loading-spinner">

                    </div>
                </div>
                <!-- End place order section -->

                @if(!$orders->isEmpty())
                    <div class="hidden md:flex bg-white p-4 rounded-lg justify-between items-center gap-4">
                        <div class="flex gap-4">
                            <div class="relative">
                                <input type="text" wire:model.live.debounce="search"
                                       class="p-2 pl-8 border border-gray-300 rounded-md"
                                       placeholder="Type to search ...">
                                <i class="fas fa-search absolute top-[13px] left-3 text-gray-700"></i>
                            </div>
                            <div class="border border-gray-300 rounded-md {{ $show_filters }} center gap-3 p-2">
                                <i class="fas fa-calendar left-3 text-gray-700"></i>
                                01 Jan - 04 Jan
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <button wire:click="resetFilters"
                                    class="p-2 px-4 bg-gray-200 text-gray-700 font-semibold rounded-lg">
                                <i class="fas fa-filter"></i>
                                {{ $show_filters === 'hidden' ? 'Show Filters' : 'Hide Filters' }}
                            </button>
                        </div>
                    </div>
                @endif

                <div class="md:bg-white h-full overflow-y-auto p-0 md:p-6 rounded-lg shadow-sm">
                    @if($orders->isEmpty())
                        <div class="text-black/90 h-full center flex-col">
                            <i class="fas fa-box-open text-4xl mb-2"></i>
                            @if($search)
                                <div class="flex flex-col gap-3">
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
                                </div>
                        </div>
                    @else
                        <div class="{{ $show_filters }}">
                            <div class="border-gray-100 flex gap-4 justify-end items-center mb-1">
                                @foreach(['title' => 'Name', 'description' => 'Description', 'total_price' => 'Total Price', 'status' => 'Status'] as $field => $label)
                                    <span onselectstart="return false"
                                          class="text-black/80 cursor-pointer"
                                          wire:click="sortBy('{{ $field }}')">
                                            {{ $label }}
                                            <i class="fas {{ $this->getSortIcon($field) }}"></i>
                                        </span>
                                @endforeach
                            </div>
                            <div class="info flex justify-end text-xs mb-5 text-gray-400 italic">
                                Select a field to sort by alphabetically or numerically.
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($orders as $order)
                                <div
                                    wire:click="showOrder({{ $order->id }})"
                                    wire:key="{{ $order->id }}"
                                    class="bg-blue-500 flex flex-col border border-blue-500 overflow-hidden justify-between rounded-lg hover:scale-105 cursor-pointer transition-all duration-100 shadow-sm">
                                    <div class="flex bg-white rounded-b-lg pb-4 flex-col justify-between h-full">
                                        <div class="m-4">
                                            <h3 class="text-lg font-semibold text-gray-800">{{ $order->title }}</h3>
                                            <p class="text-gray-600 mt-2">{{ Str::limit($order->description, 100) }}</p>
                                        </div>
                                        <div class="mx-4 flex gap-2 flex-col">
                                            <div class="flex gap-2">
                                                <div class="w-1/2 rounded-md p-2">
                                                    <p class="font-semibold text-xs">Total</p>
                                                    <div class="text-sm">
                                                        $ {{ $order->total_price }}
                                                    </div>
                                                </div>
                                                <div
                                                    class="w-1/2 text-xs center p-2 rounded-md ring-1 ring-green-500 ring-opacity-40 ring-inset">
                                                    This order is
                                                    {{ $order->status }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex border text-white text-sm border-blue-500 px-4 py-2 bg-blue-500 w-full justify-between items-center">
                                            <span
                                                class="inline-block px-2 py-1 rounded-md {{ $order->isPaid() ? $order->payment->getStatusClass() : 'bg-red-500' }} text-white">
                                                {{ $order->isPaid() ? $order->payment->status : 'Not Paid' }}
                                            </span>
                                        @if($order->isPaid())
                                            <span class="ml-2">
                                                {{ $order->payment->getStatusDescription() }}
                                            </span>
                                        @else
                                            <a href="{{ route('orders.pay', $order->id) }}" class="ml-2 btn btn-sm">
                                                Pay
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>

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
                            Please use a bigger device to view orders better
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
