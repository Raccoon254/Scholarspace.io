<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderManagement extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::all();
    }

    public function render()
    {
        return view('orders.index');
    }
}
