<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class OrdersComponent extends Component
{
    public $orders;

    protected $listeners = [
        'currencyPurchased'
    ];

    public function render()
    {
        return view('livewire.orders-component');
    }

    public function mount(): void
    {
        $this->orders = $this->refreshOrders();
    }

    public function currencyPurchased(): void
    {
        $this->orders = $this->refreshOrders();
    }

    protected function refreshOrders(): Collection
    {
        return Order::with('rate')->latest()->take(3)->get();
    }
}
