<?php

namespace App\Livewire;

use App\Models\Blog;
use Illuminate\View\View;
use Livewire\Component;

class BlogView extends Component
{
    public $blog;

    public function mount($slug): void
    {
        $this->blog = Blog::with(['user', 'images'])->where('slug', $slug)->first();
    }

    public function render(): View
    {
        return view('blogs.show')->layout('layouts.guest');
    }
}
