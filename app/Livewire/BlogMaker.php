<?php

namespace App\Livewire;

use App\Services\MarkdownParser;
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

    public function parseTextToMarkdown($content): void
    {
        $parser = new MarkdownParser();
        $this->markdownContent = $parser->parse($content);
    }


    public function uploadImage()
    {
        // Implement image upload logic here
        Image::create([
           //TODO: Get the blog ID,
            'blog_id' => 1,
            'path' => $this->tempImage->store('images', 'public'),
        ]);
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
