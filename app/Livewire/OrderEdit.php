<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Livewire\Component;

use Illuminate\Support\Facades\Session;
use Livewire\Features\SupportRedirects\Redirector;

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

    public function save(): RedirectResponse | Redirect | Redirector
    {
        $this->validate();
        $initial_order_status = $this->order->status;
        $initial_payment_status = $this->order->payment->status ?? 'pending';

        if ($initial_order_status === $this->status && $initial_payment_status === $this->paymentStatus) {
            return redirect()->route('orders.show', $this->order)->with('warning', 'Order updated successfully.');
        }

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

        // We need to send a notification to the user when the order status is changed
        // We need to notify the writers when the order status is changed with all the order details



        return redirect()->route('orders.show', $this->order)->with('warning', 'Order updated successfully.');
    }

    public function render(): View
    {
        return view('livewire.order-edit');
    }
}
