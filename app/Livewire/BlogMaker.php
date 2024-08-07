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
        $this->markdownContent = $this->content;
    }

    public function addHeading($level): void
    {
        $this->content .= "\n#{$level} ";
        $this->updatedContent();
    }

    public function addParagraph(): void
    {
        $this->content .= "\n\n";
        $this->updatedContent();
    }

    public function addBold(): void
    {
        $this->content .= " **bold text** ";
        $this->updatedContent();
    }

    public function addList(): void
    {
        $this->content .= "\n- list item";
        $this->updatedContent();
    }

    public function addLink(): void
    {
        $this->content .= " [link text](url) ";
        $this->updatedContent();
    }

    public function addImage(): void
    {
        $this->content .= " ![alt text](image_url) ";
        $this->updatedContent();
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
