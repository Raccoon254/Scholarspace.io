<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold mb-6">Create Order</h1>

    <form method="POST" action="">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Title</label>
            <input type="text" name="title" id="title" class="form-input w-full" value="{{ $orderData['title'] ?? '' }}">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="form-textarea w-full" rows="3">{{ $orderData['description'] ?? '' }}</textarea>
        </div>

        @php
            $totalPrice = $orderData['total_price'] ?? 0;
        @endphp
        <div class="mb-4">
            <label for="total_price" class="block text-gray-700 font-bold mb-2">Total Price</label>
            <input type="number" name="total_price" id="total_price" class="form-input w-full" value="{{ $totalPrice }}" readonly>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 font-bold mb-2">Status</label>
            <input type="text" name="status" id="status" class="form-input w-full" value="{{ $orderData['status'] ?? 'pending' }}" readonly>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create Order
        </button>
    </form>
</div>
