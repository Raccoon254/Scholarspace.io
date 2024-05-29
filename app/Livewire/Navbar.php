<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public $hasNotifications = false;
    public $hasMessages = false;

    #[On('profile-photo-updated')]
    public function mount(): void
    {
        $user = Auth::user();
        if ($user) {
            $this->hasMessages = $user->hasUnreadMessages ?? false;
            //TODO: Add hasUnreadNotifications attribute to the User model
            $this->hasNotifications = $user->hasUnreadNotifications ?? false;
        }
    }

    #[On('received-message')]
    public function receivedMessage(): void
    {
        $this->hasMessages = true;
    }

    public function render(): View
    {
        return view('layouts.navigation');
    }
}
