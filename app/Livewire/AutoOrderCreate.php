<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class AutoOrderCreate extends Component
{
    public function render(): View
    {
        $orderData = session('orderData');
        //set the user_id to the authenticated user
        $orderData['user_id'] = auth()->id();
        return view('livewire.auto-order-create', ['orderData' => $orderData]);
    }
}
