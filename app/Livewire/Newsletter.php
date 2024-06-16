<?php

namespace App\Livewire;

use App\Models\Subscriber;
use Illuminate\View\View;
use Livewire\Component;

class Newsletter extends Component
{
    public $email;

    protected $rules = [
        'email' => 'required|email',
    ];

    public function subscribe(): void
    {
        $this->validate();

        //if the email already exists in the database, return an error message
        if (Subscriber::where('email', $this->email)->exists()) {
            session()->flash('message', 'You have already subscribed to the newsletter!');

            return;
        }

        Subscriber::create(['email' => $this->email]);

        session()->flash('message', 'You have successfully subscribed to the newsletter!');

        $this->reset('email');
    }

    public function render(): View
    {
        return view('livewire.newsletter');
    }
}
