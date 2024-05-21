<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Order;

class OrderCreate extends Component
{
    public $title;
    public $description;
    public $total_price;

    public function createOrder()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'total_price' => 'required|numeric',
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'status' => 'pending',
            'total_price' => $this->total_price,
        ]);

        $this->reset(['title', 'description', 'total_price']);

        return redirect()->route('orders.pay', ['order' => $order->id]);
    }

    public function render(): View
    {
        return view('orders.create');
    }
}
