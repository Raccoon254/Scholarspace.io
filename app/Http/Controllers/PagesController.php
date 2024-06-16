<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function orderCreate(): View
    {
        $orderData = session('orderData');
        //set the user_id to the authenticated user
        $orderData['user_id'] = auth()->id();

        //dd($orderData);
        //array:5 [▼ // app/Http/Controllers/PagesController.php:24
        //  "user_id" => 1
        //  "title" => "Test"
        //  "description" => "Agriculture"
        //  "total_price" => 33
        //  "status" => "pending"
        //]
        return view('order.create', ['orderData' => $orderData]);
    }

    public function contact(): View
    {
        return view('contact');
    }

    public function notfound(): View
    {
        return view('errors.404');
    }

    public function info_price_calculator(): View
    {
        return view('info.price-calculator');
    }

    public function howItWorks(): View
    {
        $steps = [
            [
                'icon' => 'fas fa-clipboard-list',
                'color' => 'blue-500',
                'title' => 'Kickstart Your Journey',
                'description' => 'Begin your academic journey with us by filling out our secure order form. Provide us with detailed instructions, your deadline, and any additional requirements for your paper.',
            ],
            [
                'icon' => 'fas fa-user-edit',
                'color' => 'green-500',
                'title' => 'Expert Matchmaking',
                'description' => 'Our team of seasoned writers will review your order. We will assign the most qualified writer based on their expertise and subject area to ensure the best fit.',
            ],
            [
                'icon' => 'fas fa-file-alt',
                'color' => 'yellow-500',
                'title' => 'Crafting Your Paper',
                'description' => 'Your assigned writer will dive deep into research and craft a well-written, plagiarism-free paper tailored to your requirements. They will adhere strictly to your instructions and academic standards.',
            ],
            [
                'icon' => 'fas fa-check-double',
                'color' => 'red-500',
                'title' => 'Quality Check',
                'description' => 'Our rigorous quality assurance process ensures that your paper meets the highest standards before delivery. This includes meticulous proofreading, formatting, and compliance with your instructions.',
            ],
            [
                'icon' => 'fas fa-download',
                'color' => 'purple-500',
                'title' => 'Delivery & Support',
                'description' => 'Your completed paper will be delivered to you before the deadline. Our support team is available round the clock to assist you with any questions or concerns.',
            ],
            [
                'icon' => 'fas fa-sync-alt',
                'color' => 'orange-500',
                'title' => 'Revisions On Demand',
                'description' => 'We offer unlimited revisions to ensure your complete satisfaction with the final product. If you need any changes or adjustments, simply request a revision, and we will take care of it promptly.',
            ],
        ];

        return view('static.how-it-works', ['steps' => $steps]);
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
            'user_message' => 'required|min:10',
        ]);

        // Send the email
        Mail::send('emails.contact', $request->all(), function ($message) {
            $owner_email = env('OWNER_EMAIL' ?? 'tomsteve187@gmail.com');
            $message->to($owner_email)->subject('Contact Form Submission');
        });

        // Redirect or return a response
        return redirect()->back()->with('success', 'Thank you for your message!');
    }

    public function subscribe(Request $request)
    {
        // Validate the form data
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        // Subscribe the user to the newsletter
        dd('Subscribed');
    }
}
