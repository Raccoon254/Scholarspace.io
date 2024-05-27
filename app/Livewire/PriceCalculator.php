<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Date;
use Illuminate\View\View;
use Livewire\Component;
use function PHPUnit\Framework\isFalse;

class PriceCalculator extends Component
{
    public string $topic;
    public string $subject;
    public string $deadline;
    public int $wordCount;
    public bool $isWords = true;
    public int $price = 0;

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

    public function placeOrder(): void
    {
        // Place order modal pre-filled with the data
        // Load the modal
    }

    public function render(): View
    {
        $rate = $this->calculateRate();
        $wordCount = $this->wordCount ?? 0;
        $deadline = $this->getDeadline();

        return view('livewire.price-calculator', [
            'calculated_price' => $wordCount * $rate
        ]);
    }

    private function calculateRate(): float
    {
        $baseRate = $this->isWords ? 15 / 500 : 15.00;
        $deadline = $this->getDeadline();

        if ($deadline == Date::now()->format('Y-m-d')) {
            return $baseRate + $baseRate * 0.10;
        } elseif ($deadline == Date::now()->addDay()->format('Y-m-d')) {
            return $baseRate + $baseRate * 0.05;
        } elseif ($deadline == Date::now()->addDays(2)->format('Y-m-d')) {
            return $baseRate;
        }

        return $baseRate;
    }

    private function getDeadline(): string
    {
        return $this->deadline ?? Date::now()->addDays(4)->format('Y-m-d');
    }
}
