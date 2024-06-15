<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public $orders;
    public function mount(): void
    {
        $this->orders = auth()->user()->orders;
    }

    public function render(): View
    {
        return view('dashboard');
    }
}
