<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function dashboard(): View
    {
        return view('dashboard');
    }

    public function contact(): View
    {
        return view('contact');
    }

    public function howItWorks(): View
    {
        return view('static.how-it-works');
    }

    public function services(): View
    {
        return view('static.services');
    }

    public function about(): View
    {
        return view('static.about');
    }

    public function submit(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'user_message' => 'required',
        ]);

        // Send the email
        Mail::send('emails.contact', $request->all(), function ($message) {
            //email from env
            $owner_email = env('OWNER_EMAIL' ?? 'tomsteve187@gmail.com');
            $message->to($owner_email)->subject('Contact Form Submission');
        });

        // Redirect or return a response
        return redirect()->back()->with('success', 'Thank you for your message!');
    }
}
