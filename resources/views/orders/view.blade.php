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

                        <div class="bg-white p-6 rounded-lg shadow-sm mb-6 space-y-4">
                            <div class="flex items-center space-x-2 mb-4">
                                <i class="fas fa-info-circle text-blue-500 text-xl"></i>
                                <h3 class="text-lg font-semibold">Order Information</h3>
                            </div>
                            <div class="space-y-2">
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-tag text-gray-500"></i>
                                    <span class="font-bold">Title:</span> {{ $order->title }}
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-align-left text-gray-500"></i>
                                    <span class="font-bold">Description:</span> {{ $order->description }}
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-tasks text-gray-500"></i>
                                    <span class="font-bold">Status:</span>
                                    <span
                                        class="{{ $order->getStatusClass() }} px-2 py-1 rounded">{{ ucfirst($order->status) }}</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-dollar-sign text-gray-500"></i>
                                    <span class="font-bold">Total Price:</span>
                                    ${{ number_format($order->total_price, 2) }}
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                            <h3 class="text-lg md:text-xl mb-4 font-semibold">Attachments</h3>
                            @if ($order->attachments->isNotEmpty())
                                <ul>
                                    <div class="flex w-full flex-wrap gap-3">
                                        @foreach($order->attachments as $attachment)
                                            <div class="min-w-[128px]">
                                                <div
                                                    class="attachmentContainer container-{{ $attachment->id }} bg-gray-200
                                                    hover:scale-105 transition-transform duration-300
                                                    rounded-xl ring-1 ring-blue-100 ring-opacity-40 cursor-pointer overflow-hidden relative"
                                                    data-type="{{ $attachment->type }}"
                                                    data-path="{{ Storage::url($attachment->path) }}">
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

                        <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                            <div class="flex items-center mb-4">
                                <i class="fas fa-credit-card text-blue-500 text-xl mr-2"></i>
                                <h3 class="text-lg font-semibold">Payment Information</h3>
                            </div>
                            @if ($order->isPaid())
                                <div class="mb-2">
                                    <i class="fas fa-dollar-sign text-gray-500 mr-2"></i>
                                    <span class="font-bold">Amount Paid:</span>
                                    ${{ number_format($order->payment->amount, 2) }}
                                </div>
                                <div class="mb-2">
                                    <i class="fas fa-money-check-alt text-gray-500 mr-2"></i>
                                    <span
                                        class="font-bold">Payment Method:</span> {{ ucfirst($order->payment->payment_method) }}
                                </div>
                                <div class="mb-2">
                                    <i class="fas fa-info-circle text-gray-500 mr-2"></i>
                                    <span class="font-bold">Payment Status:</span>
                                    <span
                                        class="{{ $order->payment->getStatusClass() }} text-white px-2 py-1 rounded">{{ ucfirst($order->payment->status) }}</span>
                                </div>
                            @else
                                <div class="mb-2">
                                    <i class="fas fa-exclamation-triangle text-red-500 mr-2"></i>
                                    <span class="font-bold">Payment not yet made.</span>
                                </div>
                            @endif
                        </div>

                        <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
                            <div class="flex items-center mb-4">
                                <i class="fas fa-truck text-green-500 text-xl mr-2"></i>
                                <h3 class="text-lg font-semibold">Delivery Information</h3>
                            </div>
                            @if ($order->delivery->isNotEmpty())
                                <ul class="list-disc md:pl-6">
                                    @foreach ($order->delivery as $delivery)
                                        <div
                                            class="mb-2 font-semibold text-xl">{{ Str::ucfirst($delivery->status) }}</div>
                                        <section>
                                            {{ Str::limit($delivery->description, 100)}}
                                        </section>
                                        @if ($delivery->attachments->isNotEmpty())
                                            <details class="bg-gray-100 mb-4 rounded-md p-4">
                                                <summary class="mb-2">
                                                    <i class="fas fa-paperclip text-gray-500 mr-2"></i>
                                                    <span class="font-normal">View Attachments</span>
                                                </summary>
                                                <section>
                                                    <ul>
                                                        <div class="flex w-full flex-wrap gap-3">
                                                            @foreach($delivery->attachments as $attachment)
                                                                <div class="min-w-[128px]">
                                                                    <div
                                                                        class="attachmentContainer container-{{ $attachment->id }} bg-gray-200
                                                    hover:scale-105 transition-transform duration-300
                                                    rounded-xl ring-1 ring-blue-100 ring-opacity-40 cursor-pointer overflow-hidden relative"
                                                                        data-type="{{ $attachment->type }}"
                                                                        data-path="{{ Storage::url($attachment->path) }}">
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
                                                </section>
                                            </details>
                                        @else
                                            <p>No attachments available.</p>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <div class="mb-2">
                                    <i class="fas fa-times-circle text-red-500 mr-2"></i>
                                    <span class="font-bold">Not yet delivered.</span>
                                </div>
                            @endif
                        </div>

                        <div class="w-full mt-4 md:mt-6 gap-4 flex flex-wrap items-center md:justify-end">
                            @can('manage')
                                <a href="{{ route('orders.deliver', $order) }}"
                                   class="btn btn-md btn-ghost ring ring-green-500">
                                    <i class="fas fa-truck"></i>
                                    <span>Deliver Order</span>
                                </a>
                                <a href="{{ route('orders.edit', $order) }}"
                                   class="btn btn-md btn-ghost ring ring-gray-200">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit Order</span>
                                </a>
                            @endcan
                            <a href="{{ route('orders.index') }}"
                               class="btn btn-md btn-ghost ring ring-blue-500">
                                <i class="fas fa-arrow-left"></i>
                                <span>Back to Orders</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
