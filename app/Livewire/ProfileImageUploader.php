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
    public $color = 'blue-500';

    public function mount($color): void
    {
        $this->color = $color;
    }

    public function save(): void
    {
        $path = $this->profilePhoto->store('public/' . auth()->user()->name . '/profile');
        sleep(5);
        auth()->user()->update(['profile_photo' => $path]);
        $this->profilePhoto = null;
        $this->dispatch('profile-photo-updated');
    }

    public function render(): View
    {
        return view('livewire.profile-image-uploader');
    }
}
