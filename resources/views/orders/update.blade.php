<div class="bg-white p-6 rounded-lg shadow-sm">
    <h3 class="text-lg font-semibold mb-4">Update Order Status</h3>
    <form wire:submit.prevent="updateStatus">
        <div class="mb-4">
            <input type="number" wire:model="orderId" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Order ID">
            @error('orderId') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <select wire:model="status" class="w-full p-2 border border-gray-300 rounded-lg">
                <option value="" disabled selected>Select Status</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
            </select>
            @error('status') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg">Update Status</button>
    </form>
</div>
