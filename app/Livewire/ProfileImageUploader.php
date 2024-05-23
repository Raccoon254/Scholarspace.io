<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileImageUploader extends Component
{
    use WithFileUploads;

    #[Validate('image|max:1024')]
    public $profilePhoto;

    public function save(): void
    {
        $path = $this->profilePhoto->store('public/' . auth()->user()->name . '/profile');

        auth()->user()->update(['profile_photo' => $path]);
    }

    public function render(): View
    {
        return view('livewire.profile-image-uploader');
    }
}
