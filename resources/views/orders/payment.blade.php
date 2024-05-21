<div class="p-2 md:p-0 text-black/80 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-green-500 fa-credit-card"></i>
            {{ __('Payment for Order #:orderId', ['orderId' => $order->id]) }}
        </h2>
    </x-slot>

    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="bg-white p-6 relative h-full rounded-lg shadow-sm">
                <!-- We accept -->
                <h3 class="text-xl font-semibold mb-8">We Accept</h3>
                <div class="flex space-x-3 mb-8">
                    @foreach($payment_methods as $method)
                        @php
                        //call getPaymentDetails method from OrderPayment class
                        $logo = (new App\Livewire\OrderPayment)->getPaymentDetails($method)['logo'];
                        @endphp
                        <div class="w-32 ring-1 ring-inset bg-gray-50 relative rounded-lg ring-blue-200 p-2 h-auto">
                            <!-- About icon -->
                            <a href="#" class="absolute top-0 right-0 bg-blue-500 text-white p-2 rounded-bl-lg rounded-tr-lg hover:bg-blue-600">
                                <i class="fas h-2 w-2 text-xs center fa-info-circle"></i>
                            </a>
                            <img src="{{ $logo }}" alt="{{ $method }} Logo" class="h-16 object-cover w-auto">
                        </div>
                    @endforeach
                </div>
                <!-- End We accept -->

                <!-- Instructions -->
                <h3 class="text-lg font-semibold mb-4">Payment Instructions</h3>
                <ol class="list-decimal list-inside mb-6">
                    <li>Select your preferred payment method from the dropdown menu below.</li>
                    <li>Follow the instructions provided for the selected payment method.</li>
                    <li>After making the payment, our system will verify the transaction.</li>
                    <li>Once the payment is verified, we will start processing your order immediately.</li>
                </ol>
                <!-- End Instructions -->

                <h3 class="text-lg font-semibold mb-4">Select Payment Method</h3>
                <form wire:submit.prevent="pay">
    <div class="mb-4">
        <select wire:model.live="payment_method" class="w-full p-2 border border-gray-300 rounded-lg">
            <option value="">Select Payment Method</option>
            @foreach($payment_methods as $method)
                <option value="{{ $method }}">{{ ucfirst($method) }}</option>
            @endforeach
        </select>
        @error('payment_method') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
    @if ($payment_method)
        <div class="mb-4">
            <img src="{{ $payment_details['logo'] }}" alt="{{ $payment_method }} Logo" class="w-32 h-auto mb-2">
            <p class="text-sm text-gray-700">{{ $payment_details['instructions'] }}</p>
        </div>
    @endif
    <button type="submit" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg">Proceed to Pay</button>
</form>
            </div>
        </div>
    </div>
</div>
