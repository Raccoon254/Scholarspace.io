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
    public $words;
    public $pages;

    public array $attachments = [];

    public function mount(): void
    {
        $this->isWords = true;
        $this->loggedInUser = auth()->user();

        if (session()->has('orderData')) {
            $orderData = session('orderData');
            $this->title = $orderData['title'] ?? '';
            $this->description = $orderData['description'] ?? '';
            $this->total_price = $orderData['total_price'] ?? 0;
        }
    }

    public function setCalculationMode($mode): void
    {
        $this->isWords = $mode;
    }

    public function updated($propertyName): void
    {
        $price_per_word = 15 / 275;

        if ($this->words) {
            $this->total_price = $this->words * $price_per_word;
        }
        if ($this->pages) {
            $this->total_price = $this->pages * 15;
        }
    }


    public function createOrder(): Redirector | RedirectResponse
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
