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

    public function mount(): void
    {
        //check if session has blog data
        if (session()->has('blog')) {
            $blog = session()->get('blog');
            $this->title = $blog['title'];
            $this->content = $blog['content'];
            //alert
            session()->flash('message', 'Blog data restored from session');
        }

    }

    public function saveBlog(): mixed
    {
        $this->validate([
            'title' => 'required|min:6',
            'content' => 'required|min:6',
        ]);

        //save blog to session
        session()->put('blog', [
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $blogData = [
            'title' => $this->title,
            'content' => $this->content, // Storing HTML content directly
            'slug' => Str::slug($this->title),
            'user_id' => Auth::id(),
        ];

        try {
            $blog = Blog::create($blogData);
        } catch (\Exception $e) {
            if (Str::contains($e->getMessage(), 'blogs_slug_unique')) {
                return redirect()->route('blog.create')->with('error', 'Blog with this title already exists');
            }
            return redirect()->route('blog.create' )->with('error', 'Failed to create blog' . $e->getMessage());
        }

        return redirect()->route('blogs.show', $blog->slug);
    }

    public function render(): View
    {
        return view('blogs.create')->layout("blogs.layout");
    }
}
