<?php

namespace App\Http\Livewire;

use App\Jobs\TotalCostJob;
use App\Models\Order;
use Livewire\Component;

class Dashboard extends Component
{
    public $orders = [];

    public function mount()
    {
        $ordersData = Order::all();
        foreach ($ordersData as $order) {
            $this->orders[] = ['customer_name' => $order->customer_name, 'total' => $order->total()];
        }
    }

    public function dispatchJob(){
        TotalCostJob::dispatch();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
