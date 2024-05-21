<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;

class OrderShow extends Component
{
    use WithPagination;

    public string $sortField = 'id'; // Default sort field
    public bool $sortAsc = true; // Default sort direction
    public string $role;

    public function mount(): void
    {
        $this->role = auth()->user()->role ?? 'client';
    }

    protected $listeners = ['orderCreated' => 'refreshOrders'];

    public function sortBy($field): void
    {
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

    public function render(): View
    {
        if ($this->role === 'writer') {
            $orders = Order::orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(10);
        } else {
            $orders = Order::where('user_id', auth()->id())->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')->paginate(10);
        }
        return view('orders.show', [
            'orders' => $orders
        ]);
    }
}
