<?php

namespace App\Livewire;

use App\Models\Payment;
use Illuminate\View\View;
use Livewire\Component;

class VerifyPayments extends Component
{
    public string $search = '';
    public function render(): View
    {
        $payments = Payment::where('order_id', 'like', '%' . $this->search . '%')
            ->orWhere('amount', 'like', '%' . $this->search . '%')
            ->orWhere('payment_method', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->paginate(40);

        return view('livewire.verify-payments',
            [
                'payments' => $payments
            ]
        );
    }
}
