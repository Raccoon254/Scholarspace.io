<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\View\View;
use Livewire\Component;

class OrderEdit extends Component
{
    public Order $order;
    public $status;
    public $paymentStatus;

    protected $rules = [
        'status' => 'required|string',
        'paymentStatus' => 'required|string',
    ];

    public function mount(Order $order): void
    {
        $this->order = $order;
        $this->status = $order->status;
        $this->paymentStatus = $order->payment->status ?? 'pending';
    }

    public function save(): void
    {
        $this->validate();

        $this->order->status = $this->status;
        $this->order->save();

        if ($this->order->payment) {
            $this->order->payment->status = $this->paymentStatus;
            $this->order->payment->save();

            // If the status is failed then change the order status to 'pending'
            if ($this->paymentStatus === 'failed') {
                $this->order->status = 'pending';
                $this->order->save();
            }
        }

        session()->flash('message', 'Order updated successfully.');
    }

    public function render(): View
    {
        return view('livewire.order-edit');
    }
}
