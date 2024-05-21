<?php

namespace App\Livewire;

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

    public function mount($orderId): void
    {
        $this->order = Order::findOrFail($orderId);
        $this->updatePaymentDetails();
    }

    public function updatedPaymentMethod()
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
                'instructions' => 'Please send your payment to our PayPal address: payments@example.com',
            ],
            'cash_app' => [
                'logo' => asset('images/cash-app-logo.png'),
                'instructions' => 'Please send your payment to our Cash App username: $ExampleUsername',
            ],
            'zelle' => [
                'logo' => asset('images/zelle.png'),
                'instructions' => 'Please send your payment to our Zelle phone number: (123) 456-7890',
            ],
        ];

        return $details[$method] ?? ['logo' => '', 'instructions' => ''];
    }

    public function pay()
    {
        // Implement the payment logic here
        // Show success message
        // Redirect to the dashboard
    }

    public function render(): View
    {
        return view('orders.payment');
    }
}
