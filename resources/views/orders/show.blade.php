<div class="bg-white h-[85vh] overflow-y-auto text-black/70 p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold mb-4">Order History</h3>
    @if($orders->isEmpty())
        <div class="text-black/90 h-full center flex-col">
            <i class="fas fa-box-open text-4xl mb-2"></i>
            You haven't placed any orders yet.
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="table">
            <thead>
            <tr>
                @foreach(['title' => 'Title', 'description' => 'Description', 'total_price' => 'Total Price', 'status' => 'Status'] as $field => $label)
                    <th class="gap-2 py-2 text-black/80 text-[14px] cursor-pointer" wire:click="sortBy('{{ $field }}')">
                        {{ $label }}
                        <i class="fas {{ $this->getSortIcon($field) }}"></i>
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $order->title }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $order->description }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">${{ $order->total_price }}</td>
                    <td class="px-4 py-2 border-b border-gray-300">{{ $order->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    @endif
</div>
