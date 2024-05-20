<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 leading-tight">
            <i class="fas text-blue-500 fa-shopping-cart"></i>
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <livewire:OrderManagement />
        </div>
    </div>
</div>
