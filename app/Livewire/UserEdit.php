<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

class UserEdit extends Component
{
    public User $user;
    public $name;
    public $email;
    public $phone;
    public $location;
    public $profile_photo;
    public $role;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'phone' => 'nullable|string|max:15',
        'location' => 'nullable|string|max:255',
        'profile_photo' => 'nullable|image|max:1024', // Limit size to 1MB
        'role' => 'required|string|in:writer,client,admin',
    ];

    public function mount($id): void
    {
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->location = $this->user->location;
        $this->role = $this->user->role;
    }

    public function save(): Redirector | Redirect | RedirectResponse
    {
        $this->validate();

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'role' => $this->role,
        ]);

        session()->flash('message', 'User profile updated successfully.');

        return redirect()->route('users.show', $this->user->id);
    }

    public function render(): View
    {
        return view('livewire.user-edit');
    }
}
