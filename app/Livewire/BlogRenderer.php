<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Blog;
use Livewire\WithPagination;

class BlogRenderer extends Component
{
    use WithPagination;
    public $blogs;

    public function mount(): void
    {
        // Fetch all blogs with their related users and images
        $this->blogs = Blog::with(['user', 'images'])->orderBy('created_at', 'desc')->get();
    }

    public function render(): View
    {
        return view('livewire.blog-renderer')->layout('blogs.guest');
    }
}
