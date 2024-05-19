<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class Messages extends Component
{
    public $loggedInUser;
    public $currentUserRole;
    public $search = '';
    public $selectedUser;
    public $message;
    public $messages;

    public function mount(): void
    {
        $this->loggedInUser = auth()->user();
        $this->currentUserRole = $this->loggedInUser->role;
    }

    public function openChat($id): void
    {
        $this->selectedUser = User::find($id);
        $this->messages = $this->loggedInUser->messages()->where('receiver_id', $id)->orWhere('sender_id', $id)->get();
    }

    public function render(): View
    {
        return view('messages',
            [
                'clients' => User::where('role', 'client')
                ->where('name', 'like', '%' . $this->search . '%')->orWhere('email', 'like', '%' . $this->search . '%')
                ->get()
            ]
        );
    }
}
