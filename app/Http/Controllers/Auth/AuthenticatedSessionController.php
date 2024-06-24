<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Jenssegers\Agent\Agent;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        // Get device and browser information using Agent
        $agent = new Agent();
        $device = $agent->device();
        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);

        $user->activity()->create([
            'activity' => 'login',
            'description' => 'User ' . $user->name . ' logged in',
            'device' => $device,
            'browser' => $browser . ' ' . $browserVersion,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);


        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $agent = new Agent();
        $device = $agent->device();
        $browser = $agent->browser();
        $browserVersion = $agent->version($browser);

        $user->activity()->create([
            'activity' => 'logout',
            'description' => 'User ' . $user->name . ' logged out',
            'device' => $device,
            'browser' => $browser . ' ' . $browserVersion,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
