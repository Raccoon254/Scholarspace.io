<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
class Alerts extends Component
{
    public function render(): View
    {
        return view('session.alerts');
    }
}
