<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class PriceCalculator extends Component
{
    public $topic;
    public $subject;
    public $word_count;
    public $totalPrice = 0.00;
    public $showModal = false;
    public $isWords = true;

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

    public function setCalculationMode($wordsMode): void
    {
        $this->isWords = $wordsMode;
        $this->calculatePrice();
        $this->dispatch('toggleWordMode', $wordsMode);
    }

    public function calculatePrice(): void
    {
        $pages = $this->isWords ? ceil($this->word_count / 275) : $this->word_count;
        $this->totalPrice = $this->isWords ? ceil($this->word_count * 0.054545) : $pages * 15;
    }

    public function showPriceModal(): void
    {
        $this->calculatePrice();
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function placeOrder(): void
    {
        // Logic to create the order
        $this->reset(['topic', 'subject', 'word_count']);
        $this->closeModal();
        // dd($this->topic, $this->subject, $this->word_count);
    }

    public function render(): View
    {
        return view('livewire.price-calculator',
        [
            'totalPrice' => $this->totalPrice
        ]);
    }
}
