<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class OrderUpdate extends Component
{
    public $orderId;
    public $status;

    public function updateStatus()
    {
        $this->validate([
            'orderId' => 'required|exists:orders,id',
            'status' => 'required|string',
        ]);

        $order = Order::find($this->orderId);
        $order->update(['status' => $this->status]);

        $this->reset(['orderId', 'status']);

        $this->dispatch('orderStatusUpdated');
    }

    public function render()
    {
        return view('orders.update');
    }
}
