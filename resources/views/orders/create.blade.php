<div class="bg-white p-6 rounded-lg shadow-md">
    <h3 class="text-lg font-semibold mb-4">Create New Order</h3>
    <form wire:submit.prevent="createOrder">
        <div class="mb-4">
            <input type="text" wire:model="title" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Title">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <textarea wire:model="description" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Description"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <input type="number" wire:model="total_price" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="Total Price">
            @error('total_price') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg">Create Order</button>
    </form>
</div>
