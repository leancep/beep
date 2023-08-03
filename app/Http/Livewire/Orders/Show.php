<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use Livewire\Component;

class Show extends Component
{
    public $order_id;
    public $order;

    public function render()
    {
        $this->order = Order::find($this->order_id);
        return view('livewire.orders.show');
    }
}
