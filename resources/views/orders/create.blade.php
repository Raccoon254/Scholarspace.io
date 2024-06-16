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
                <!-- About icon -->
                <a href="{{ route('info.order.create') }}"
                   class="absolute top-0 right-0 bg-blue-500 text-white p-2 rounded-bl-lg rounded-tr-lg hover:bg-blue-600">
                    <i class="fas h-4 w-4 center fa-info-circle"></i>
                </a>

                <h3 class="text-3xl font-semibold mb-4 flex items-center gap-2">
                    Create New Order
                </h3>

                <p class="text-gray-600 text-sm mb-6">
                    To create a new order, please fill out the following form. You can provide a title, description, and
                    total price for your order. Additionally, you can attach any relevant files or documents to your
                    order.
                </p>

                <div class="mb-4">
                    <label for="title" class="block mb-2 font-semibold">Title</label>
                    <input type="text" wire:model="title" id="title"
                           class="w-full p-2 border border-gray-300 rounded-lg"
                           placeholder="Enter a title for your order">
                    @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block mb-2 font-semibold">Description</label>
                    <textarea wire:model="description" id="description"
                              class="w-full p-2 border border-gray-300 rounded-lg"
                              placeholder="Provide a description for your order"></textarea>
                    @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4 flex gap-4 items-end">
                   <div class="">
                       <label for="calculation_mode" class="block mb-2 font-semibold">Calculation Mode</label>
                       <div class="flex">
                           <button wire:click="setCalculationMode(true)" class="px-3 py-2 border {{ $isWords ? 'bg-green-500 text-white border-green-500' : 'border-gray-300' }}
                            rounded-l-lg" id="wordsButton">Words
                           </button>
                           <button wire:click="setCalculationMode(false)" class="px-3 py-2 border {{ $isWords ? 'border-gray-300' : 'bg-green-500 text-white border-green-500' }}
                            rounded-r-lg" id="pagesButton">Pages
                           </button>
                       </div>
                   </div>
                    <button
                        class="px-3 py-2 right-16 bg-gray-100 border-none rounded-lg text-primary ring-1 ring-blue-500 w-full"
                        onclick="document.getElementById('fileInput').click();">
                        <i class="fas fa-paperclip"></i>
                        Add Attachments
                    </button>
                </div>

                <div class="flex w-full gap-2">
                    <div class="mb-4 w-1/2 {{ !$isWords ? 'opacity-20' : '' }}">
                        <label for="words" class="block mb-2 font-semibold">Number of Words</label>
                        <input type="number" wire:model.live="words" id="words"
                               @disabled(!$isWords)
                                   min="0"
                               @class(!$isWords ? 'bg-gray-100 w-full p-2 border border-gray-300 rounded-lg' : 'w-full p-2 border border-gray-300 rounded-lg')
                               placeholder="Number of words">
                        @error('words') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4 w-1/2 {{ !$isWords ? '' : 'opacity-20' }}">
                        <label for="pages" class="block mb-2 font-semibold">Number of Pages</label>
                        <input type="number" wire:model.live="pages" id="pages"
                               @disabled($isWords)
                                      min="0"
                               @class($isWords ? 'bg-gray-100 w-full p-2 border border-gray-300 rounded-lg' : 'w-full p-2 border border-gray-300 rounded-lg')
                               placeholder="Number of pages">
                        @error('pages') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="total_price" class="block mb-2 font-semibold">Total Price</label>
                    <div type="number" id="total_price"
                         class="w-full p-2 relative border opacity-60 border-gray-300 rounded-lg">
                            <span class="text-gray-500 absolute top-0 right-0 p-1 text-xs">
                                Total price is calculated automatically
                            </span>
                        {{number_format($total_price, 2)}} USD
                    </div>

                    @error('total_price') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <button wire:click="createOrder"
                        class="w-full relative py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 transition-colors">
                    Create Order
                    <span class="absolute top-0 right-0 p-1 text-xs">
                            {{ number_format($total_price, 2) }} USD
                        </span>
                </button>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm md:w-2/3">
                <h3 class="text-2xl font-semibold mb-4 flex items-center gap-2">
                    <i class="fas fa-file-upload text-blue-500"></i>
                    Uploaded Attachments
                </h3>

                @if (count($attachments) > 0)
                    <div class="flex flex-wrap">
                        @foreach($attachments as $attachment)
                            <div
                                class="bg-white relative p-1 mr-2 mb-2 flex flex-col items-center justify-center w-24 h-24 rounded-md"
                                wire:key="{{ $attachment->getClientOriginalName().$loop->index }}">
                                <div
                                    class="flex relative overflow-clip flex-col items-center justify-center w-full h-20 bg-blue-200 rounded-[4px]">
                                    @if (in_array($attachment->getMimeType(), ['image/jpeg', 'image/png']))
                                        <img src="{{ $attachment->temporaryUrl() }}" alt="Attachment"
                                             class="w-full h-20 object-cover rounded-md">
                                    @elseif ($attachment->getMimeType() == 'image/svg+xml')
                                        <i class="fas fa-file-image text-2xl text-gray-500"></i>
                                    @elseif ($attachment->getMimeType() == 'application/zip')
                                        <i class="fas fa-file-archive text-2xl text-gray-500"></i>
                                    @else
                                        <i class="fas fa-file text-2xl text-gray-500"></i>
                                    @endif
                                </div>
                                <span class="text-[10px] mt-1">
                                    {{ substr($attachment->getClientOriginalName(), 0, 12) }}{{ strlen($attachment->getClientOriginalName()) > 5 ? '...' : '' }}
                                </span>

                                <button wire:click="removeAttachment('{{ $attachment->getClientOriginalName() }}')"
                                        class="absolute top-0 right-1 -mt-2 -mr-3 bg-red-500 text-white center rounded-full p-2 h-5 w-5 hover:bg-red-600 transition-colors">
                                    <i class="fas text-sm fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="mt-6">
                        <div class="flex center w-full mb-2">
                            <span class="text-gray-500">Your order attachments will be displayed here</span>
                        </div>
                        <input wire:model.live="attachments" type="file" id="fileInput" multiple style="display: none;"
                               accept="image/*, application/pdf, application/zip, application/x-rar-compressed application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                        <div class="center mt-4">
                            <button
                                class="btn right-16 mr-2 btn-ghost ring-1 ring-blue-500 bg-gray-100 text-primary"
                                onclick="document.getElementById('fileInput').click();">
                                <i class="fas fa-paperclip"></i>
                                Add Attachments
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
