<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class Table extends Component
{
    public $orders;
    public function render()
    {
        $this->orders = Order::all();
    
        return view('livewire.orders.table');
    }
}
