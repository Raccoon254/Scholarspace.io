<div class="flex relative flex-col">
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
                    <!-- Displaying the first 6 characters of the file name -->
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
    <div class="text-red-500 bg-gray-100 text-xs px-4">
        @error('attachments.*') <span class="error m-1">{{ $message }}</span> @enderror
        @error('newMessage') <span class="error m-1">{{ $message }}</span> @enderror
    </div>
    <div class="relative flex gap-2 items-center">
        <label class="w-full">
            <input id="messageInput" wire:model.live="newMessage" wire:keydown.enter="sendMessage"
                   class="message-input"
                   type="text" placeholder="Type your message...">
        </label>
        <!-- Hidden file input -->
        <input wire:model.live="attachments" type="file" id="fileInput" multiple style="display: none;" accept="image/*, application/pdf, application/zip, application/x-rar-compressed application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document">
        <!-- Clip icon for opening file dialog -->
        <button
            class="btn absolute right-16 btn-sm mr-2 btn-ghost btn-circle bg-gray-100 text-primary bottom-2 transform[-50%] ml-2"
            onclick="document.getElementById('fileInput').click();">
            <i class="fas fa-paperclip"></i>
        </button>

        <!-- Send message button -->
        <button wire:click="sendMessage"
                wire:loading.class.remove="btn-primary"
                wire:loading.class="btn-ghost"
                class="btn right-3 btn-primary ring-1 ring-offset-2 border rounded-md btn-square mr-2">
            <i wire:target="sendMessage" wire:loading.class="hidden" class="fas fa-paper-plane"></i>
            <span wire:loading wire:target="sendMessage"
                  class="loading loading-spinner text-primary loading-sm"></span>
        </button>
    </div>
</div>
@script
<script>
    //messagesSent event listener
    Livewire.on('messagesSent', (event) => {
        //clear the message input field
        document.getElementById('messageInput').value = '';
    });
</script>
@endscript
