<?php

namespace App\Livewire;

use App\Models\User;
use App\Notifications\NewUserJoined;
use App\Notifications\UserWelcome;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Notification;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{

    public $name;
    public $email;
    public $phone;
    public $location;
    public $password;
    public $password_confirmation;

    public function register(): Application|Redirector|\Illuminate\Contracts\Foundation\Application|RedirectResponse
    {

        $user_data_array = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'password' => Hash::make($this->password),
        ];

        dd($user_data_array);

        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'string', 'max:255', 'min:8', 'unique:' . User::class],
            'location' => ['required', 'string', 'max:255', 'min:3'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'location' => $this->location,
            'password' => Hash::make($this->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Send notification to the new user
        $user->notify(new UserWelcome($user));

        // Send notification to all writers
        $writers = User::where('role', 'writer')->get();
        Notification::send($writers, new NewUserJoined($user));

        return redirect(route('dashboard'));
    }

    public function render(): View
    {
        return view('auth.register')
            ->layout('layouts.guest');
    }
}
