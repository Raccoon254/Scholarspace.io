<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-blue-500 fa-credit-card"></i>
            {{ __('Manage Payments') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl text-black/80 relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="w-full md:pr-2 flex-col">
                <div class="rounded-lg h-[85vh] overflow-scroll p-4 relative w-full bg-white">
                    <h1 class="text-2xl font-semibold my-4 text-center text-gray-800">
                        Manage Payments
                    </h1>
                    <div class="flex justify-end relative">
                        <input type="text" wire:model.live="search" class="w-full max-w-sm p-2 border border-gray-300 rounded-lg"
                               placeholder="Search Payments">
                        <i class="fas fa-search absolute top-3 right-3 text-gray-400"></i>
                    </div>
                    <table class="table my-4 ring-1 ring-blue-200 overflow-clip">
                        <thead>
                        <tr class="bg-gray-100 border-blue-300 text-gray-600 text-sm">
                            <th>Id</th>
                            <th>Amount</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr class="border-blue-200">
                                <td>{{ $payment->id }}</td>
                                <td>{{ $payment->amount }}</td>
                                <td>{{ $payment->payment_method }}</td>
                                <td>{{ $payment->status }}</td>
                                <td class="flex gap-2">
                                    <button class="custom-btn">Edit</button>
                                    <button class="custom-danger-btn">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
