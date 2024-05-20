<div class="w-full h-full flex flex-col gap-4">
    <div class="flex flex-col gap-4">
        <!-- Orders List -->
        <div class="w-full h-full">
            <livewire:OrderShow />
        </div>

        <!-- Order Create Form -->
        <div class="w-full space-y-4 md:w-1/3">
            <div class="w-full">
                <livewire:OrderCreate />
            </div>
            <!-- Update Order Status -->
            <div class="w-full">
                <livewire:OrderUpdate />
            </div>
        </div>
    </div>

</div>
