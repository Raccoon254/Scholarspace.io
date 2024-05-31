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
            <input id="messageInput" wire:model.live="newMessage"
                   class="message-input"
                   autocomplete="off"
                   type="text" placeholder="Type your message...">
        </label>
        <input wire:model.live="attachments" type="file" id="fileInput" multiple style="display: none;" accept="image/*, application/pdf, application/zip, application/x-rar-compressed application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document">
        <button
            class="btn absolute right-16 btn-sm mr-2 btn-ghost btn-circle bg-gray-100 text-primary bottom-2 transform[-50%] ml-2"
            onclick="document.getElementById('fileInput').click();">
            <i class="fas fa-paperclip"></i>
        </button>

        <button id="sendMessageButton"
                class="btn right-3 btn-primary ring-1 ring-offset-2 border rounded-md btn-square mr-2">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
        <div id="typingStatus"></div>
</div>

@script
<script>
    const socket = io('http://localhost:3000');

    // Send the username to the server on connection
    let authUser = '{{ auth()->user() }}';
    authUser = JSON.parse(authUser.replace(/&quot;/g, '"'));

    socket.on('connect', () => {
        socket.emit('userConnected', authUser);
    });

    socket.on('disconnect', () => {
        socket.emit('userDisconnected', authUser);
    });

    socket.on('receiveMessage', (message) => {
        console.log('New message received:', message);
        // Emit refresh messages event
        Livewire.dispatch('messagesSent');
        Livewire.dispatch('received-message');
    });

    document.getElementById('sendMessageButton').addEventListener('click', sendMessage);
    let receiver = '{{ $recipient }}';
    receiver = JSON.parse(receiver.replace(/&quot;/g, '"'));

    function sendMessage() {
        const messageInput = document.getElementById('messageInput');
        const message = messageInput.value;

        if (message) {
            socket.emit('sendMessage', { from: authUser.id, to: receiver.id, message });
            messageInput.value = '';
        }
    }

    Livewire.on('typing', (isTyping) => {
        socket.emit('typing', { from: authUser.id, to: receiver.id });
    });

    Livewire.on('stopTyping', () => {
        socket.emit('stopTyping', { from: authUser.id, to: receiver.id });
    });

    socket.on('typing', (from) => {
        document.getElementById('typingStatus').innerText = `${from} is typing...`;
    });

    socket.on('stopTyping', (from) => {
        document.getElementById('typingStatus').innerText = '';
    });

    // socket.on('connectedUsers', (data) => {
    //     console.log('Connected users:', data);
    //     Livewire.dispatch('connectedUsers', { onlineUsers : data });
    // });

    Livewire.on('messagesSent', () => {
        document.getElementById('messageInput').value = '';
    });

    // Input event listeners for typing
    document.getElementById('messageInput').addEventListener('input', () => {
        Livewire.dispatch('typing', document.getElementById('messageInput').value.length > 0);
    });

    document.getElementById('messageInput').addEventListener('blur', () => {
        Livewire.dispatch('stopTyping');
    });
</script>
@endscript
