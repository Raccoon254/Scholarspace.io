<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
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
    public $deadline;

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
        //validate the form
        $this->validate([
            'topic' => 'required|string',
            'subject' => 'required|string',
            'word_count' => 'required|numeric|min:1',
            'deadline' => 'required|date|after:today'
        ]);
        $this->calculatePrice();
        $this->showModal = true;
        $this->dispatch('toggleModal', true);

        if (!auth()->check()) {
            session()->flash('error', 'You need to login or register to place an order');
        }
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->dispatch('toggleModal', false);
    }

    public function placeOrder()
    {
        // Logic to create the order
        $this->closeModal();

        $orderData = [
            'user_id' => auth()->check() ? auth()->id() : null,
            'title' => $this->topic,
            'description' => $this->subject,
            'total_price' => $this->totalPrice,
            'status' => 'pending',
        ];

        // Store the order in the session
        session(['orderData' => $orderData]);

        // Reset the form fields
        $this->reset(['topic', 'subject', 'word_count']);

        // redirect to the order creation page
        if (!auth()->check()) {
            session()->flash('error', 'You need to login or register to place an order');
        }

        return redirect()->route('orders.create.new');
    }

    public function render(): View
    {
        try {
            $pages = $this->isWords ? ceil((int)($this->word_count ?? 0) / 275) : (int)($this->word_count ?? 0);
            $this->totalPrice = $this->isWords ? ceil((int)($this->word_count ?? 0) * 0.054545) : $pages * 15;
        } catch (\Exception $e) {
            $this->totalPrice = 0;
        }

        return view('livewire.price-calculator',
            [
                'price' => $this->totalPrice
            ]);
    }
}
