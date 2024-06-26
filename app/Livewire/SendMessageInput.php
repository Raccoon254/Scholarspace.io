<?php

namespace App\Livewire;

use App\Jobs\ProcessSentMessages;
use App\Models\Attachment;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class SendMessageInput extends Component
{
    use WithFileUploads;

    public string $newMessage = '';
    public array $attachments = [];
    public User $recipient;
    public mixed $loggedInUser;
    public mixed $socket_server;

    public function mount($selectedUser): void
    {
        $this->recipient = $selectedUser;
        $this->loggedInUser = Auth::user();
        $this->socket_server = env('SOCKET_URL');
    }

    public function updating($newMessage): void
    {
        $this->dispatch('typing', ['isTyping' => !empty($newMessage)]);
        //after 1 second, the typing event will be emitted with isTyping set to false
        $this->dispatch('stopTyping', ['isTyping' => !empty($newMessage)]);
    }

    public function removeAttachment($name): void
    {
        $this->attachments = $this->attachments->filter(function ($attachment) use ($name) {
            return $attachment->getClientOriginalName() !== $name;
        });
    }

    public function sendMessage(): void
    {
        if (empty($this->newMessage) && empty($this->attachments)) {
            return;
        }

        // Emit the message through Socket.IO
        $this->dispatch('sendMessage', ['message' => $this->newMessage]);

        // Save the message and attachments to the database
        $message = Message::create([
            'sender_id' => $this->loggedInUser->id,
            'receiver_id' => $this->recipient->id,
            'content' => $this->newMessage,
        ]);

        if ($this->attachments) {
            foreach ($this->attachments as $attachment) {
                $path = $attachment->store('public/' . $this->loggedInUser->name . '/messages/attachments');
                Attachment::create([
                    'message_id' => $message->id,
                    'name' => $attachment->getClientOriginalName(),
                    'path' => $path,
                    'type' => $attachment->getMimeType(),
                    'size' => $attachment->getSize(),
                ]);
            }
        }

        $this->attachments = [];
        $this->newMessage = '';

        $this->reset('attachments', 'newMessage');

        $this->dispatch('messagesSent');
        ProcessSentMessages::dispatch($message)->delay(now()->addSeconds(10));
    }

    public function render(): View
    {
        return view('livewire.send-message-input');
    }
}
