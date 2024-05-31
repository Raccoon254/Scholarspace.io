<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Messages extends Component
{
    use WithFileUploads;

    public mixed $loggedInUser;
    public string $currentUserRole;
    public string $search = '';
    public User $selectedUser;
    public $messages;
    public int $unreadMessages;
    public array $attachments = [];
    public $onlineUsers = [];

    public function mount(): void
    {
        $this->loggedInUser = auth()->user();
        $this->currentUserRole = $this->loggedInUser->role;

        if ($this->currentUserRole === 'client') {
            $this->openChat(User::where('role', 'writer')->first()->id);
        }
    }

    #[On('connectedUsers')]
    public function connectedUsers($onlineUsers): void
    {
        // Convert the array to a collection and pluck the user ids
        $this->onlineUsers = collect($onlineUsers)->pluck('id')->toArray();
    }

    #[On('messagesSent')]
    public function messagesSent(): void
    {
        $this->messages = $this->loggedInUser->messages()->where('receiver_id', $this->selectedUser->id)->orWhere('sender_id', $this->selectedUser->id)->orderBy('created_at', 'asc')->get();
    }

    public function openChat($id): void
    {
        $this->selectedUser = User::find($id);
        $this->messages = $this->loggedInUser->messages()->where('receiver_id', $id)->orWhere('sender_id', $id)->orderBy('created_at', 'asc')->get();

        $this->dispatch('chatOpened');
        $this->messages->where('receiver_id', $this->loggedInUser->id)->whereNull('read_at')->each->update(['read_at' => now()]);
    }

    public function unreadMessages(User $user): int
    {
        //Get the number of unread messages for the authenticated user from the selected user
        return $this->loggedInUser->receivedMessages()->where('sender_id', $user->id)->whereNull('read_at')->count();
    }

    public function render(): View
    {
        return view('messages',
            [
                'clients' => User::where('role', 'client')
                    ->where(function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('email', 'like', '%' . $this->search . '%');
                    })
                    ->get()
            ]
        );
    }
}
