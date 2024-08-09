<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class BlogMaker extends Component
{
    public $title;
    public $content = '';
    public $contentHtml;

    public function saveBlog(): RedirectResponse
    {
        $this->validate([
            'title' => 'required|min:6',
            'content' => 'required|min:6',
        ]);

        $blogData = [
            'title' => $this->title,
            'content' => $this->content, // Storing HTML content directly
            'slug' => Str::slug($this->title),
            'user_id' => Auth::id(),
        ];

        $blog = Blog::create($blogData);

        return redirect()->route('blogs.show', $blog->slug);
    }

    public function render(): View
    {
        return view('blogs.create')->layout("blogs.layout");
    }
}
