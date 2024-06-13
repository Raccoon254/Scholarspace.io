<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\Order;
use App\Models\Payment;

class OrderPayment extends Component
{
    public Order $order;
    public $payment_method = 'paypal';
    public $payment_methods = ['paypal', 'cash_app', 'zelle'];
    public $payment_details;
    public bool $isPaid = false;

    public function mount($orderId): void
    {
        $this->order = Order::findOrFail($orderId);
        $this->updatePaymentDetails();
        //if the order is already paid, redirect to the dashboard
        if ($this->order->isPaid()) {
            $this->isPaid = true;
        }
    }

    public function updatedPaymentMethod(): void
    {
        $this->updatePaymentDetails();
    }

    private function updatePaymentDetails(): void
    {
        $this->payment_details = $this->getPaymentDetails($this->payment_method);
    }

    public function getPaymentDetails($method): array
    {
        $details = [
            'paypal' => [
                'logo' => asset('images/paypal.png'),
                'instructions' => 'Please send your payment to our PayPal address:
                stevovosti64@gmail.com',
            ],
            'cash_app' => [
                'logo' => asset('images/cash-app-logo.png'),
                'instructions' => 'Please send your payment to our Cash App username: $stevovosti64',
            ],
            'zelle' => [
                'logo' => asset('images/zelle.png'),
                'instructions' => 'Please send your payment to our Zelle phone number: +254 790 743 009',
            ],
        ];

        return $details[$method] ?? ['logo' => '', 'instructions' => ''];
    }

    public function pay()
    {
        // Implement the payment logic here
        $payment = Payment::create([
            'order_id' => $this->order->id,
            'amount' => $this->order->total_price,
            'payment_method' => $this->payment_method,
            'status' => 'pending',
        ]);
        // Show success message
        // session()->flash('success', 'Payment initiated successfully. Please wait for confirmation.');
        // TODO: Send notification to the writer
        // Redirect to the dashboard
        return redirect()->route('payment', ['paymentId' => $payment->id])->with('success', 'Payment initiated successfully. Please wait for confirmation.');
    }

    public function render(): View
    {
        return view('orders.payment');
    }
}
