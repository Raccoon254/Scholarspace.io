<div class="flex relative flex-col">
    @include('components.attachments')
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

        <button id="sendMessageButton" wire:click="sendMessage"
                class="btn right-3 btn-primary ring-1 ring-offset-2 border rounded-lg btn-square">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
    <div id="socket" class="hidden">
        {{ $socket_server  }}
    </div>
</div>

@script
<script>
    document.addEventListener('livewire:initialized', () => {
        // Get the socket server URL from the hidden div
        const socketServer = document.getElementById('socket').innerText;
        // Clean the socket server URL
        let cleanSocketServer = socketServer.replace(/\s/g, '');
        const socket = io(cleanSocketServer);

        // Send the username to the server on connection
        let authUser = '{{ auth()->user() }}';
        authUser = JSON.parse(authUser.replace(/&quot;/g, '"'));

        document.getElementById('sendMessageButton').addEventListener('click', sendMessage);
        let receiver = '{{ $recipient }}';
        receiver = JSON.parse(receiver.replace(/&quot;/g, '"'));

        function sendMessage() {
            const messageInput = document.getElementById('messageInput');
            const message = messageInput.value;

            if (message) {
                socket.emit('sendMessage', {from: authUser.id, to: receiver.id, message});
                messageInput.value = '';
            }
        }

        socket.on('stopTyping', (from) => {
            //document.getElementById('typingStatus').innerText = '';
        });

        Livewire.on('messagesSent', () => {
            document.getElementById('messageInput').value = '';
        });

        // Input event listeners for typing
        document.getElementById('messageInput').addEventListener('input', () => {
            socket.emit('typing', {from: authUser.id, to: receiver.id});
            console.log('Typing...');
        });

        document.getElementById('messageInput').addEventListener('blur', () => {
            socket.emit('stopTyping', {from: authUser.id, to: receiver.id});
            console.log('Stopped typing...');
        });
    })
</script>
@endscript
