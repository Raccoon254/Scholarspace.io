<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public $orders;
    public function mount(): void
    {
        // Get the authenticated user and fetch their latest 3 orders
        $user = auth()->user();
        $this->orders = $user->orders()->latest()->take(3)->get();
    }

    public function render(): View
    {
        return view('dashboard');
    }
}
