<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileImageUploader extends Component
{
    use WithFileUploads;

    public $profilePhoto;

    public function save()
    {
        $this->validate([
            'profilePhoto' => 'image|max:1024', // 1MB Max
        ]);

        $path = $this->profilePhoto->store('public/' . auth()->user()->name . '/profile');

        auth()->user()->update(['profile_photo' => $path]);

        dd('Profile photo uploaded successfully.');
    }

    public function render(): View
    {
        return view('livewire.profile-image-uploader');
    }
}
