<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\View\View;
use Livewire\Component;

class VerifyOrderPayment extends Component
{
    public Payment $payment;
    public Order $order;
    public function mount($paymentId): void
    {
        $this->payment = Payment::findOrFail($paymentId);
        $order_id = $this->payment->order_id;
        $this->order = Order::findOrFail($order_id);
        $this->checkPaymentStatus();
    }

    public function checkPaymentStatus(): void
    {
        if ($this->payment->status === 'completed') {
            session()->flash('success', 'Payment has been verified successfully');
        } else {
            session()->flash('warning', 'Payment verification in progress');
        }
    }

    public function render(): View
    {
        return view('orders.verify-order-payment');
    }
}
