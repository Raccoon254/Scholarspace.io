<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Blog;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogMaker extends Component
{
    use WithFileUploads;

    public $title;
    public $content = '';
    public $markdownContent = '';
    public $tempImage;

    protected $rules = [
        'title' => 'required|min:6',
        'content' => 'required',
    ];

    public function updatedContent(): void
    {
        $this->parseTextToMarkdown($this->content);
    }

    function parseTextToMarkdown($content): void
    {
        //parse markdown
        $parsed_content = app('markdown')->parse($this->content);
        $this->markdownContent = $parsed_content;
    }

    public function uploadImage()
    {
        // Implement image upload logic here
    }

    public function saveBlog(): RedirectResponse
    {
        $this->validate();

        $blogData = [
            'title' => $this->title,
            'content' => $this->markdownContent,
            'slug' => Str::slug($this->title),
            'user_id' => auth()->id(),
        ];

        $blog = Blog::create($blogData);

        return redirect()->route('blogs.show', $blog->slug);
    }

    public function render(): View
    {
        return view('blogs.create')->layout("blogs.layout");
    }
}
