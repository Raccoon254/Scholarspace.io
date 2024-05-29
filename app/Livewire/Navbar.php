<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Navbar extends Component
{
    public $hasNotifications = false;
    public $hasMessages = false;

    public function mount(): void
    {
        $user = Auth::user();
        if ($user) {
            $this->hasMessages = $user->hasUnreadMessages ?? false;
            //TODO: Add hasUnreadNotifications attribute to the User model
            $this->hasNotifications = $user->hasUnreadNotifications ?? false;
        }
    }

    public function render(): View
    {
        return view('layouts.navigation');
    }
}
