<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class SendMessageInput extends Component
{
    use WithFileUploads;

    public $message;
    public array $attachments = [];
    public User $recipient;

    public function mount($selectedUser): void
    {
        $this->recipient = $selectedUser;
    }

    public function render(): View
    {
        return view('livewire.send-message-input');
    }
}
