<x-app-layout>
    <div class="p-2 md:p-0 md:py-4">
        <x-slot name="header">
            <h2 class="text-gray-800 flex items-center gap-4 leading-tight">
                <i class="fas text-blue-500 fa-home"></i>
                {{ __('Order Page') }}
            </h2>
        </x-slot>
        <div class="max-w-7xl relative h-full mx-auto">
            <div class="flex sm:mx-3 lg:mx-4 flex-col h-full md:flex-row">
                <div class="w-full md:w-2/3 md:pr-2 flex-col">
                    <div class="rounded-lg relative p-4 w-full bg-white">
                        <h2 class="text-2xl font-semibold mb-6">Order Details</h2>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">Order Information</h3>
                            <p><strong>Title:</strong> {{ $order->title }}</p>
                            <p><strong>Description:</strong> {{ $order->description }}</p>
                            <p><strong>Status:</strong> <span
                                    class="{{ $order->getStatusClass() }}">{{ ucfirst($order->status) }}</span></p>
                            <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">Attachments</h3>
                            @if ($order->attachments->isNotEmpty())
                                <ul>
                                    <div class="flex w-full flex-wrap gap-3">
                                        @foreach($order->attachments as $attachment)
                                            <div class="min-w-[128px]">
                                                <div
                                                    class="attachmentContainer container-{{ $attachment->id }} bg-gray-200
                                                    hover:scale-105 transition-transform duration-300
                                                    rounded-xl ring-1 ring-blue-100 ring-opacity-40 cursor-pointer overflow-hidden relative" data-type="{{ $attachment->type }}" data-path="{{ Storage::url($attachment->path) }}" >
                                                    @if (in_array($attachment->type, ['image/jpeg', 'image/png', 'image/gif']))
                                                        <img
                                                            src="{{ Storage::url($attachment->path) }}"
                                                            alt="Attachment"
                                                            class="w-[128px] h-32 object-cover">
                                                    @elseif ($attachment->type == 'application/pdf')
                                                        <div
                                                            class="flex items-center justify-center h-32 bg-red-200">
                                                            <i class="fas fa-file-pdf text-4xl text-red-500"></i>
                                                        </div>
                                                    @elseif ($attachment->type == 'application/zip' || $attachment->type == 'application/x-rar-compressed')
                                                        <div
                                                            class="flex items-center justify-center h-32 bg-green-200">
                                                            <i class="fas fa-file-archive text-4xl text-green-500"></i>
                                                        </div>
                                                    @elseif (str_starts_with($attachment->type, 'video/'))
                                                        <div
                                                            class="flex items-center justify-center h-32 bg-blue-200">
                                                            <i class="fas fa-file-video text-4xl text-blue-500"></i>
                                                        </div>
                                                    @elseif (str_starts_with($attachment->type, 'audio/'))
                                                        <div
                                                            class="flex items-center justify-center h-32 bg-yellow-200">
                                                            <i class="fas fa-file-audio text-4xl text-yellow-500"></i>
                                                        </div>
                                                    @else
                                                        <div
                                                            class="flex items-center justify-center h-32 bg-gray-300">
                                                            <i class="fas fa-file text-4xl text-gray-500"></i>
                                                        </div>
                                                    @endif
                                                    <a href="{{ Storage::url($attachment->path) }}"
                                                       class="absolute top-0 btn btn-xs btn-circle btn-ghost bg-blue-500 right-0 mt-1 mr-1 text-white hover:ring-1 ring-blue-500 text-xs px-2 py-1">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </ul>
                            @else
                                <p>No attachments available.</p>
                            @endif
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">Payment Information</h3>
                            @if ($order->isPaid())
                                <p><strong>Amount Paid:</strong> ${{ number_format($order->payment->amount, 2) }}</p>
                                <p><strong>Payment Method:</strong> {{ ucfirst($order->payment->payment_method) }}</p>
                                <p><strong>Payment Status:</strong> <span
                                        class="{{ $order->payment->getStatusClass() }}">{{ ucfirst($order->payment->status) }}</span>
                                </p>
                            @else
                                <p>Payment not yet made.</p>
                            @endif
                        </div>

                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">Delivery Information</h3>
                            @if ($order->delivery->isNotEmpty())
                                <ul>
                                    @foreach ($order->delivery as $delivery)
                                        <li>{{ $delivery->details }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Not yet delivered.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
