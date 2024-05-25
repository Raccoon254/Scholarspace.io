<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Referrals extends Component
{
    public $referrals;

    public function mount(): void
    {
        $this->referrals = Auth::user()->referrals;
    }

    public function render(): View
    {
        return view('livewire.referrals');
    }
}
