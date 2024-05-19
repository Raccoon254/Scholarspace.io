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

        if ($this->currentUserRole === 'client') {
            $this->openChat(User::where('role', 'writer')->first()->id);
        }
    }

    public function openChat($id): void
{
    $this->selectedUser = User::find($id);
    $this->messages = $this->loggedInUser->messages()->where('receiver_id', $id)->orWhere('sender_id', $id)->orderBy('created_at', 'asc')->get();
}

    //sendMessage
    public function sendMessage(): void
    {
        if (empty($this->message)) {
            return;
        }

        $this->loggedInUser->messages()->create([
            'receiver_id' => $this->selectedUser->id,
            'content' => $this->message
        ]);

        $this->message = '';
        $this->messages = $this->loggedInUser->messages()->where('receiver_id', $this->selectedUser->id)->orWhere('sender_id', $this->selectedUser->id)->sortBy('created_at', 'asc')->get();
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
