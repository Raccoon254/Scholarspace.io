<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Messages extends Component
{
    public function render(): View
    {
        return view('messages');
    }
}
