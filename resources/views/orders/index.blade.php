<div class="w-full flex flex-col gap-4">
    <div class="flex gap-4">
        <!-- Orders List -->
        <div class="w-full h-full md:w-2/3">
            <livewire:OrderShow />
        </div>

        <!-- Order Create Form -->
        <div class="w-full md:w-1/3">
            @livewire('order-create')
        </div>
    </div>

    <!-- Update Order Status -->
    <div class="w-full">
        @livewire('order-update')
    </div>
</div>
