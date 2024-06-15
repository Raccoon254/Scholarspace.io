<div class="p-2 md:p-0 md:py-4">
    <x-slot name="header">
        <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
            <i class="fas text-green-500 fa-credit-card"></i>
            {{ __('Verify Order Payment') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl relative h-full mx-auto">
        <div class="flex gap-4 sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
            <div class="bg-white p-6 relative md:w-2/3 rounded-lg shadow-sm">

                <div class="payment-info">
                    <section class="mb-4 flex items-center gap-4">
                        <div class="w-1/2">
                            <h3 class="text-lg md:text-2xl font-semibold mb-2">{{ $order->title }}</h3>
                            <p class="text-gray-600 mb-4">
                                <!-- Limit the description to 120 characters -->
                                {{ Str::limit($order->description, 120) }}
                            </p>
                        </div>
                        <div class="bg-green-500 p-3 text-white w-1/2 rounded-md">
                            <h4 class="text-lg font-semibold mb-2">Order Details:</h4>
                            <p class="mb-2">Total Price</p>
                            <div>
                                {{ $order->total_price }}
                            </div>
                        </div>
                    </section>

                    <h4 class="text-lg font-semibold mb-2 mt-4">Payment Information:</h4>
                    @if($order->payment)
                        <table class="table-auto w-full mb-4">
                            <tbody>
                            <tr class="border-b">
                                <td class="py-2">Payment ID:</td>
                                <td class="py-2">{{ $order->payment->id }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Payment Date:</td>
                                <td class="py-2">{{ $order->payment->created_at->format('M d, Y') }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Payment Time:</td>
                                <td class="py-2">{{ $order->payment->created_at->format('h:i A') }}</td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Payment Status:</td>
                                <td class="py-2"><span
                                        class="{{ $order->payment->getStatusClass() }} p-2 rounded-md text-white">{{ $order->payment->status }}</span></p>
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-2">Payment Method:</td>
                                <td class="py-2">{{ $order->payment->payment_method }}</td>
                            </tr>
                            </tbody>
                        </table>
                    @else
                        <p>No payment information available</p>
                    @endif
                </div>
                @if($order->attachments->count() > 0)
                    <h4 class="text-lg font-semibold mb-2">Attachments:</h4>
                    <div class="mt-2 grid grid-cols-1 gap-4 sm:grid-cols-2 ">
                        @foreach($order->attachments as $attachment)
                            <div class="max-h-80 rounded-lg p-2 overflow-hidden">
                                @if(in_array($attachment->type, ['image', 'image/png', 'video', 'png', 'jpg', 'jpeg', 'gif']))
                                    <section>
                                        <div class="text-center font-semibold text-lg mb-2">
                                            {{ $attachment->name }}
                                        </div>
                                        <div class="w-full mb-4">
                                            @if($attachment->type === 'image' || in_array($attachment->type, ['png', 'image/png', 'jpg', 'jpeg', 'gif']))
                                                <img src="{{ Storage::url($attachment->path) }}"
                                                     alt="{{ $attachment->name }}"
                                                     class="w-full h-52 bg-green-200 rounded-lg object-cover">
                                            @elseif($attachment->type === 'video')
                                                <video src="{{ $attachment->path }}" controls
                                                       class="max-w-full"></video>
                                            @endif
                                        </div>
                                    </section>
                                @else
                                    <section>
                                        <a href="{{ $attachment->path }}" target="_blank">
                                            {{ $attachment->name }}
                                            {{ $attachment->type }}
                                        </a>
                                    </section>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No attachments for this order</p>
                @endif

            </div>
        </div>
    </div>
</div>
