<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StaticPageController extends Controller
{
    public function welcome(): View
    {
        session()->flash('success', 'Welcome to Scholarspace! Get help with your assignments from expert writers.');

        $process_steps = [
            [
                'icon' => 'fas avatar fa-pen-nib',
                'color' => 'text-blue-500',
                'title' => 'Place Your Order',
                'text' => 'Submit your assignment details, including the topic, instructions, and due date.'
            ],
            [
                'icon' => 'fas fa-user-graduate',
                'color' => 'text-green-500',
                'title' => 'Hire a Writer',
                'text' => 'Our expert writers will review your order and start working on it immediately.'
            ],
            [
                'icon' => 'fas fa-check-circle',
                'color' => 'text-yellow-500',
                'title' => 'Get Your Assignment',
                'text' => 'Receive your high-quality assignment before the due date, reviewed and ready for submission.'
            ]
        ];

        /* Testimonials
         * TODO: Replace the dummy testimonials with real testimonials from the database
         * Create a Testimonial model and a TestimonialController to fetch testimonials from the database
         */

        $testimonials = [
            [
                'icon' => 'fas fa-user-graduate',
                'avatar' => 'images/avatars/eddy.jpg',
                'color' => 'text-green-500',
                'image' => 'images/avatar1.png',
                'name' => 'Eddy Johnson',
                'subject' => 'Computer Science',
                'testimonial' => 'Scholarspace has been a lifesaver for me. The writers are knowledgeable and always deliver quality work on time.'
            ],
            [
                'icon' => 'fas fa-user-graduate',
                'avatar' => 'images/avatars/toa-heft.jpg',
                'color' => 'text-green-500',
                'image' => 'images/avatar2.png',
                'name' => 'Clinton Kelly',
                'subject' => 'Business Administration',
                'testimonial' => 'I highly recommend Scholarspace. Their writers have a deep understanding of the subject matter and provide well-researched assignments.'
            ],
            [
                'icon' => 'fas fa-user-graduate',
                'avatar' => 'images/avatars/christina.jpg',
                'color' => 'text-green-500',
                'image' => 'images/avatar3.png',
                'name' => 'Claire Williams',
                'subject' => 'English Literature',
                'testimonial' => 'I\'ve been using Scholarspace for a while now, and I\'m always impressed by the quality of work and the professionalism of the writers.'
            ]
        ];

        return view('welcome')->with('process_steps', $process_steps)->with('testimonials', $testimonials);
    }
}

