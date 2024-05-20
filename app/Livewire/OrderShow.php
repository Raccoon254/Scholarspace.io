<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderShow extends Component
{
    public $orders;

    protected $listeners = ['orderCreated' => 'refreshOrders'];

    public function mount()
    {
        $this->orders = Order::all();
    }

    public function refreshOrders()
    {
        $this->orders = Order::all();
    }

    public function render()
    {
        return view('orders.show');
    }
}
