<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class PriceCalculator extends Component
{
    public $topic;
    public $subject;
    public $deadline;
    public $wordCount;
    public $isWords = true;
    public $price = 0;

    public function calculatePrice()
    {
        // Dummy price calculation logic
        $ratePerWord = 0.10;
        $ratePerPage = 5.00;
        $this->price = $this->isWords
            ? $this->wordCount * $ratePerWord
            : $this->wordCount * $ratePerPage;
    }

    public function render(): View
    {
        return view('livewire.price-calculator');
    }
}
