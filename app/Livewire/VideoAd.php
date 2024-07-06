<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class VideoAd extends Component
{
    public $status;
    public function mount(): void
    {
        $this->status = session('videoStatus', 'hidden');
    }

    public function closeVideo(): void
    {
        $this->status = 'hidden';
        session(['videoStatus' => 'hidden']);
    }

    public function showVideo(): void
    {
        $this->status = 'visible';
        session(['videoStatus' => 'visible']);
    }

    public function render(): View
    {
        return view('livewire.video-ad');
    }
}
