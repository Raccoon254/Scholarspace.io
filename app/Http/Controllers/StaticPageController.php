<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StaticPageController extends Controller
{
    public function welcome(): View
    {
        $process_steps = [
            [
                'icon' => 'fa-solid avatar fa-pen-nib',
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
        return view('welcome')->with('process_steps', $process_steps);
    }
}

