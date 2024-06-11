<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\Order;
use Livewire\Features\SupportRedirects\Redirector;
use Livewire\WithFileUploads;

class OrderCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $total_price;
    public $loggedInUser;
    public $isWords;

    public array $attachments = [];

    public function mount(): void
    {
        $this->isWords = true;
        $this->loggedInUser = auth()->user();
    }

    public function setCalculationMode($mode): void
    {
        $this->isWords = $mode;
    }

    public function createOrder(): Redirector
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'total_price' => 'required|numeric',
            'attachments.*' => 'file|max:10240', // 10MB max for each file
        ]);

        $order = Order::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'status' => 'pending',
            'total_price' => $this->total_price,
        ]);

        if ($this->attachments) {
            foreach ($this->attachments as $attachment) {
                $attachmentPath = $attachment->store('public/' . $this->loggedInUser->name . '/orders/attachments');
                $order->attachments()->create([
                    'name' => $attachment->getClientOriginalName(),
                    'path' => $attachmentPath,
                    'type' => $attachment->getMimeType(),
                    'size' => $attachment->getSize(),
                ]);
            }
        }

        $this->reset(['title', 'description', 'total_price']);

        return redirect()->route('orders.pay', ['orderId' => $order->id])->with('success', 'Order created successfully.');
    }

    public function removeAttachment($name): void
    {
        $initialCount = count($this->attachments);
        $this->attachments = collect($this->attachments)->filter(function ($attachment) use ($name) {
            return $attachment->getClientOriginalName() !== $name;
        })->all();

        // Confirm that the attachment was removed
        if (count($this->attachments) === $initialCount) {
            dd('Attachment not found');
        }
        //Convert the collection back to an array

        $this->attachments = array_values($this->attachments);
    }

    public function render(): View
    {
        return view('orders.create');
    }
}
