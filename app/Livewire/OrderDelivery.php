<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Delivery;
use App\Models\DeliveryAttachment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Livewire\WithFileUploads;

class OrderDelivery extends Component
{
    use WithFileUploads;

    public Order $order;
    public $status;
    public $description;
    public $attachments = [];

    protected $rules = [
        'status' => 'required|string|max:255',
        'description' => 'nullable|string',
        'attachments.*' => 'file|max:10240', // max 10MB per file
    ];

    public function mount(Order $order): void
    {
        $this->order = $order;
    }

    public function saveDelivery(): RedirectResponse | Redirect | Redirector
    {
        $this->validate();

        $delivery = Delivery::create([
            'order_id' => $this->order->id,
            'status' => $this->status,
            'description' => $this->description,
        ]);

        foreach ($this->attachments as $attachment) {
            $path = $attachment->store('deliveries');
            DeliveryAttachment::create([
                'delivery_id' => $delivery->id,
                'file_path' => $path,
                'file_name' => $attachment->getClientOriginalName(),
                'file_type' => $attachment->getClientMimeType(),
            ]);
        }

        session()->flash('success', 'Delivery created successfully.');

        return redirect()->route('orders.show', $this->order);
    }

    public function render(): View
    {
        return view('livewire.order-delivery');
    }
}
