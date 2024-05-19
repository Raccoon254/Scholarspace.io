<div class="flex flex-col">
    @if (count($attachments) > 0)
        <div class="flex w-full p-2 pt-3">
            @foreach($attachments as $attachment)
                <div
                    class="flex relative flex-col items-center justify-center w-16 h-16 bg-blue-200 rounded-md mr-2">
                    @if (in_array($attachment->getMimeType(), ['image/jpeg', 'image/png']))
                        <img src="{{ $attachment->temporaryUrl() }}" alt="Attachment"
                             class="w-16 h-16 object-cover rounded-md">
                    @elseif ($attachment->getMimeType() == 'image/svg+xml')
                        <i class="fas fa-file-image text-4xl text-gray-500"></i>
                    @elseif ($attachment->getMimeType() == 'application/zip')
                        <i class="fas fa-file-archive text-4xl text-gray-500"></i>
                    @else
                        <i class="fas fa-file text-4xl text-gray-500"></i>
                    @endif
                    <!-- Displaying the first five characters of the file name -->
                    <span class="text-xs mt-1">
                                    {{ substr($attachment->getClientOriginalName(), 0, 5) }}{{ strlen($attachment->getClientOriginalName()) > 5 ? '...' : '' }}
                                </span>
                    <button wire:click="removeAttachment('{{ $attachment->getClientOriginalName() }}')"
                            class="absolute btn-warning btn btn-xs btn-circle top-0 right-1 text-red-500 hover:text-red-700 -mt-2 -mr-3">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @endforeach

        </div>
    @endif
    <div class="text-red-500 bg-gray-100 text-xs px-4">
        @error('attachments.*') <span class="error m-1">{{ $message }}</span> @enderror
        @error('newMessage') <span class="error m-1">{{ $message }}</span> @enderror
    </div>
    <div class="px-2 relative flex items-center">
        <label class="w-full">
            <input id="messageInput" wire:model="newMessage" wire:keydown.enter="sendMessage"
                   class="message-input"
                   type="text" placeholder="Type your message...">
        </label>
        <!-- Hidden file input -->
        <input wire:model.live="attachments" type="file" id="fileInput" multiple style="display: none;">
        <!-- Clip icon for opening file dialog -->
        <button
            class="btn absolute left-3 btn-ghost ring-1 ring-primary text-primary top[50%] transform[-50%] btn-sm btn-circle ml-2"
            onclick="document.getElementById('fileInput').click();">
            <i class="fas fa-paperclip"></i>
        </button>
        <!-- Send message button -->
        <button wire:click="sendMessage"
                wire:loading.class.remove="btn-primary"
                wire:loading.class="btn-ghost"
                class="btn absolute right-3 btn-primary top[50%] transform[-50%] btn-sm btn-circle mr-2">
            <i wire:target="sendMessage" wire:loading.class="hidden" class="fas fa-paper-plane"></i>
            <span wire:loading wire:target="sendMessage"
                  class="loading loading-spinner text-primary loading-sm"></span>
        </button>
    </div>
</div>
