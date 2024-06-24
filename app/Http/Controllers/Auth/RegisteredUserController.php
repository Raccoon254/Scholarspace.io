<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\NewUserJoined;
use App\Notifications\UserWelcome;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Jenssegers\Agent\Agent;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:255','min:8', 'unique:'.User::class],
            'location' => ['required', 'string', 'max:255', 'min:3'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'password' => Hash::make($request->password),
        ]);

        $admins_array = ['stevovosti64@gmail.com','tomsteve187@gmailcom','scholarlyexperts@gmail.com'];

        // Make some users writers if email in the array
        if (in_array($request->email, $admins_array)) {
            $user->role = 'writer';
            $user->save();
        }

        event(new Registered($user));

        // Get device and browser information using Agent
        $agent = new Agent();
        $device = $agent->device();
        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);

        $user->activity()->create([
            'activity' => 'registered',
            'description' => 'User registered',
            'device' => $device,
            'browser' => $browser . ' ' . $browserVersion,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        Auth::login($user);

        // Send notification to the new user
        $user->notify(new UserWelcome($user));

        // Send notification to all writers
        $writers = User::where('role', 'writer')->get();
        Notification::send($writers, new NewUserJoined($user));

        return redirect(route('dashboard', absolute: false));
    }
}
