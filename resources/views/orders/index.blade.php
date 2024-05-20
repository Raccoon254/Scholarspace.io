<div class="w-full h-full flex flex-col gap-4">
    <div class="flex gap-4">
        <!-- Orders List -->
        <div class="w-full h-full md:w-2/3">
            <livewire:OrderShow />
        </div>

        <!-- Order Create Form -->
        <div class="w-full space-y-4 md:w-1/3">
            <div class="w-full">
                @livewire('order-create')
            </div>
            <!-- Update Order Status -->
            <div class="w-full">
                @livewire('order-update')
            </div>
        </div>
    </div>

</div>
