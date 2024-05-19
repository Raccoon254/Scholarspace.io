<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Date;
use Illuminate\View\View;
use Livewire\Component;

class PriceCalculator extends Component
{
    public string $topic;
    public string $subject;
    public Date $deadline;
    public int $wordCount;
    public bool $isWords = true;
    public int $price = 0;

    public function calculatePrice(): void
    {
        // TODO ! Admin should be able to set the rate per word and rate per page
        $ratePerWord = 15 / 500;
        $ratePerPage = 15.00;
        $this->price = $this->isWords
            ? $this->wordCount * $ratePerWord
            : $this->wordCount * $ratePerPage;
    }

    public function render(): View
    {
        return view('livewire.price-calculator');
    }
}
