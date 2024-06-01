<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileImageUploader extends Component
{
    use WithFileUploads;

    #[Validate('image|max:1024')]
    public $profilePhoto;
    public $color = 'blue-500';

    public function mount($color): void
    {
        $this->color = $color;
    }

    public function save(): void
    {
        sleep(1);
        if (auth()->user()->profile_photo) {
            $fullPath = Storage::path(auth()->user()->profile_photo);
            // Replace the path to the storage folder
            $fullPath = str_replace('storage/app/storage/', 'storage/app/public/', $fullPath);
            if (file_exists($fullPath)) {
                unlink($fullPath);
            } else {
                Log::error('File not found: ' . $fullPath . ' for user: ' . auth()->user()->name);
            }
        }
        $path = $this->profilePhoto->store('public/' . auth()->user()->name . '/profile');
        auth()->user()->update(['profile_photo' => $path]);
        $this->profilePhoto = null;
        $this->dispatch('profile-photo-updated');
    }

    public function render(): View
    {
        return view('livewire.profile-image-uploader');
    }
}
