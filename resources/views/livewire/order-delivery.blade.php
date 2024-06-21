<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-green-500 fa-shopping-bag"></i>
            {{ __('New Order') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex gap-4 sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="bg-white p-6 relative md:w-2/3 rounded-lg shadow-sm">
                <form class="flex flex-col gap-4" wire:submit.prevent="saveDelivery">
                    <div>
                        <label for="status">Status</label>
                        <select class="w-full p-2 border border-gray-300 rounded-lg" type="text" id="status" wire:model="status">
                            <option disabled selected>Select a status</option>
                            <option value="pending">Pending</option>
                            <option value="revision">Revision</option>
                            <option value="completed">Completed</option>
                        </select>
                        @error('status') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="description">Description</label>
                        <textarea rows="5" class="w-full p-2 border border-gray-300 rounded-lg" id="description" wire:model="description"></textarea>
                        @error('description') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label for="attachments">Attachments</label>
                        <input type="file" id="attachments" wire:model="attachments" multiple>
                        @error('attachments.*') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <button class="custom-btn" type="submit">
                        Deliver Order
                    </button>
                </form>

                @if (session()->has('success'))
                    <div>
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
