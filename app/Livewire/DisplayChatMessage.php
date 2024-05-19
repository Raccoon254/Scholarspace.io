<?php

namespace App\Livewire;

use App\Models\Message;
use Illuminate\View\View;
use Livewire\Component;

class DisplayChatMessage extends Component
{
    public Message $message;

    public function mount(Message $message): void
    {
        $this->message = $message;
    }

    public function render(): View
    {
        return view('livewire.display-chat-message');
    }
}
