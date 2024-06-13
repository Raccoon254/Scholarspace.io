<?php

namespace App\Livewire;

use Livewire\Component;

class Register extends Component
{
    public function render()
    {
        return view('livewire.register')
            ->layout('layouts.guest');
    }
}
