<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Order;

class OrderManagement extends Component
{
    public $orders;

    public function mount(): void
    {
        $this->orders = Order::all();
    }

    public function render(): View
    {
        return view('orders.index');
    }
}
