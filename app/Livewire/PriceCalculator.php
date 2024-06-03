<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class PriceCalculator extends Component
{

    public array $subjects = [
        'Engineering',
        'Agriculture',
        'Accounting',
        'Computer Science',
        'Research paper',
        'Essay (any type)',
        'Admission essay',
        'Annotated bibliography',
        'Argumentative essay',
        'Article review',
        'Book/movie review',
        'Business plan',
        'Case study',
        'Coursework',
        'Creative writing',
        'Critical thinking',
        'Presentation or speech',
        'Research proposal',
        'Term paper',
        'Thesis/Dissertation chapter',
        'Other'
    ];


    public function render(): View
    {
        return view('livewire.price-calculator');
    }
}
