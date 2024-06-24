<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class UserShow extends Component
{
    public User $user;
    public function mount(User $user): void
    {
        $this->user = $user;
    }

    public function render(): View
    {
        return view('livewire.user-show');
    }
}
