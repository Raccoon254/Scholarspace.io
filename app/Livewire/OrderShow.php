<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class OrderShow extends Component
{
    use WithPagination;

    public string $sortField = 'id';
    public bool $sortAsc = true;
    public string $role;
    public string $search = '';
    public string $show_filters = 'block';
   public bool $show_place_order_section = false;

    public function mount(): void
    {
        $this->role = auth()->user()->role ?? 'client';
    }

    protected $listeners = ['orderCreated' => 'refreshOrders'];

    public function sortBy($field): void
    {
        if ($field === 'payment_status') {
            $field = 'status';
        }

        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function refreshOrders(): void
    {
        $this->render();
    }

    public function getSortIcon($field): string
    {
        if ($this->sortField === $field) {
            return $this->sortAsc ? 'fa-sort-up text-blue-500' : 'fa-sort-down text-blue-500';
        }
        return 'fa-sort';
    }

    public function resetFilters(): void
    {
        $this->search = '';
        $this->show_filters == 'hidden' ? $this->show_filters = 'block' : $this->show_filters = 'hidden';
    }

    public function togglePlaceOrderSection(): void
    {
        $this->show_place_order_section = !$this->show_place_order_section;
    }

    public function showOrder($orderId): void
    {
        redirect()->route('orders.show', $orderId);
    }

    public function render(): View
    {
        if ($this->role === 'writer') {
            $orders = Order::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(10);
        } else {
            $orders = Order::where('user_id', auth()->id())->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(10);
        }

        //apply search
        if ($this->search) {
            $orders = Order::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('description', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->orWhere('total_price', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate(10);
        }

        return view('orders.show', [
            'orders' => $orders
        ]);
    }
}
