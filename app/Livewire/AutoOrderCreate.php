<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\View\View;
use Livewire\Component;

class AutoOrderCreate extends Component
{
    public $title;
    public $description;
    public $totalPrice;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'totalPrice' => 'required|numeric',
    ];

    public function mount()
    {
        $orderData = session('orderData');
        $this->title = $orderData['title'] ?? '';
        $this->description = $orderData['description'] ?? '';
        $this->totalPrice = $orderData['total_price'] ?? 0;
    }

    public function createOrder()
    {
        $this->validate();

        $orderData = [
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'total_price' => $this->totalPrice,
            'status' => 'pending',
        ];

        Order::create($orderData);

        session()->forget('orderData');

        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function render(): View
    {
        return view('livewire.auto-order-create');
    }
}
