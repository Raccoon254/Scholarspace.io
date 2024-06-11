@if (count($attachments) > 0)
    <div class="flex w-full mb-2 absolute -top-20">
        @foreach($attachments as $attachment)
            <div class="bg-white relative p-1 mr-2 flex flex-col items-center justify-center w-16 h-16 rounded-md">
                <div
                    class="flex relative overflow-clip flex-col items-center justify-center w-full h-12 bg-blue-200 rounded-[4px]">
                    @if (in_array($attachment->getMimeType(), ['image/jpeg', 'image/png']))
                        <img src="{{ $attachment->temporaryUrl() }}" alt="Attachment"
                             class="w-full h-12 object-cover rounded-md">
                    @elseif ($attachment->getMimeType() == 'image/svg+xml')
                        <i class="fas fa-file-image text-2xl text-gray-500"></i>
                    @elseif ($attachment->getMimeType() == 'application/zip')
                        <i class="fas fa-file-archive text-2xl text-gray-500"></i>
                    @else
                        <i class="fas fa-file text-2xl text-gray-500"></i>
                    @endif
                </div>
                <span class="text-[10px] mt-1">
                        {{ substr($attachment->getClientOriginalName(), 0, 6) }}{{ strlen($attachment->getClientOriginalName()) > 5 ? '...' : '' }}
                    </span>

                <button wire:click="removeAttachment('{{ $attachment->getClientOriginalName() }}')"
                        class="absolute top-0 right-1 -mt-2 -mr-3 bg-amber-500 text-white center rounded-full p-2 h-5 w-5">
                    <i class="fas text-sm fa-times"></i>
                </button>
            </div>
        @endforeach

    </div>
@endif
