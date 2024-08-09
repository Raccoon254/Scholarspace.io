<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class BlogView extends Component
{
    public $blog;

    public function mount($blog): void
    {
        $this->blog = $blog;
    }

    public function render(): View
    {
        return view('blogs.show')->layout('blogs.layout');
    }
}
