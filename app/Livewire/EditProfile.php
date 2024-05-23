<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class EditProfile extends Component
{
    public function render(): View
    {
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }
}
