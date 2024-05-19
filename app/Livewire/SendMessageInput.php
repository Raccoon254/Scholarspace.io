<?php

namespace App\Livewire;

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

    public Message $message;
    public string $newMessage = '';
    public array $attachments = [];
    public User $recipient;
    public mixed $loggedInUser;

    public function mount($selectedUser): void
    {
        $this->recipient = $selectedUser;
        $this->loggedInUser = Auth::user();
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

        $message = Message::create([
            'sender_id' => $this->loggedInUser->id,
            'receiver_id' => $this->recipient->id,
            'content' => $this->newMessage,
        ]);

        if ($this->attachments) {
            foreach ($this->attachments as $attachment) {
                $path = $attachment->store('public/attachments');
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

        $this->dispatch('messagesSent');
    }

    public function render(): View
    {
        return view('livewire.send-message-input');
    }
}
