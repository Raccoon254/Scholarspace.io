<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class ManageUsers extends Component
{
    public string $search = '';
    public function render(): View
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orWhere('role', 'like', '%' . $this->search . '%')
            ->paginate(40);
        return view('livewire.manage-users', [
            'users' => $users
        ]);
    }
}
