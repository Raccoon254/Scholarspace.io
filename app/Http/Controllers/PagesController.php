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
        $services = [
            [
                'icon' => 'fas fa-pencil-alt',
                'color' => 'blue-500',
                'title' => 'Essay Writing',
                'description' => 'Whether it\'s a research paper, argumentative essay, or analysis, our writers can handle it all. We\'ll deliver a well-researched, original piece tailored to your requirements.',
                'link' => '#',
            ],
            [
                'icon' => 'fas fa-book',
                'color' => 'green-500',
                'title' => 'Dissertation and Thesis',
                'description' => 'Our expert writers can assist you with your dissertation or thesis, from proposal writing to final editing, ensuring your work meets academic standards.',
                'link' => '#',
            ],
            [
                'icon' => 'fas fa-edit',
                'color' => 'yellow-500',
                'title' => 'Editing and Proofreading',
                'description' => 'Let our professional editors polish your work and ensure it\'s free from errors, enhancing its clarity and flow.',
                'link' => '#',
            ],
            [
                'icon' => 'fas fa-graduation-cap',
                'color' => 'red-500',
                'title' => 'Admission Services',
                'description' => 'Our experienced writers can help you stand out with compelling personal statements, application essays, and other admission-related documents.',
                'link' => '#',
            ],
            [
                'icon' => 'fas fa-code',
                'color' => 'purple-500',
                'title' => 'Programming Assignments',
                'description' => 'Struggling with coding assignments? Our skilled programmers can provide solutions and help you understand the concepts better.',
                'link' => '#',
            ],
            [
                'icon' => 'fas fa-chart-line',
                'color' => 'orange-500',
                'title' => 'Business and Finance',
                'description' => 'From business plans to financial analyses, our writers have the expertise to handle your business and finance-related assignments.',
                'link' => '#',
            ],
        ];

        return view('static.services', ['services' => $services]);
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
