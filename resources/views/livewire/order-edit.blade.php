<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Order</h3>

        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Order Status</label>
                <select id="status" wire:model="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="in-progress">In Progress</option>
                    <option value="completed">Completed</option>
                    <option value="pending">Pending</option>
                </select>
                @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label for="paymentStatus" class="block text-sm font-medium text-gray-700">Payment Status</label>
                <select id="paymentStatus" wire:model="paymentStatus" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="pending">Pending</option>
                    <option value="completed">Completed</option>
                    <option value="failed">Failed</option>
                </select>
                @error('paymentStatus') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
