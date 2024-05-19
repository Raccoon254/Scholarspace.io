<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class OurFeatures extends Component
{
    public function render(): View
    {
        $features = [
            [
                'icon' => 'fa-check-circle',
                'title' => 'Plagiarism Free',
                'description' => 'We ensure all our papers are plagiarism free.',
            ],
            [
                'icon' => 'fa-user-graduate',
                'title' => 'Expert Writers',
                'description' => 'Our writers are experts in their respective fields.',
            ],
            [
                'icon' => 'fa-clock',
                'title' => 'On Time Delivery',
                'description' => 'We always deliver our work on time.',
            ],
            [
                'icon' => 'fa-money-bill-wave',
                'title' => 'Money Back Guarantee',
                'description' => 'We offer a money back guarantee if you\'re not satisfied.',
            ],
        ];

        return view('livewire.our-features', ['features' => $features]);
    }
}
