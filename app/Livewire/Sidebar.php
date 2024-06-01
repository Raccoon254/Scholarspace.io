<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{
    public $hasMessages = false;

    #[On('received-message')]
    public function receivedMessage(): void
    {
        $this->hasMessages = true;
    }

    #[On('chatOpened')]
    public function chatOpened(): void
    {
        $messages = Auth::user()->messages()->whereNull('read_at')->get();
        $this->hasMessages = $messages->isNotEmpty();
    }

    public function render(): View
    {
        return view('layouts.sidebar');
    }
}
