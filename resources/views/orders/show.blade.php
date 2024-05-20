<div class="bg-white h-full p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold mb-4">Order History</h3>
    @if($orders->isEmpty())
        <div class="text-gray-500 h-full center flex-col">
            <i class="fas fa-box-open text-4xl mb-2"></i>
            You haven't placed any orders yet.
        </div>
    @else
    <ul>
        @foreach($orders as $order)
            <li class="mb-2 p-2 border-b border-gray-300">
                <div class="flex justify-between">
                    <span>{{ $order->title }}</span>
                    <span class="text-gray-600">${{ $order->total_price }}</span>
                </div>
                <div class="text-gray-600 text-sm">{{ $order->description }}</div>
                <div class="text-sm text-gray-500">Status: {{ $order->status }}</div>
            </li>
        @endforeach
    </ul>
        @endif
</div>
