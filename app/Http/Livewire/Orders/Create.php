<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use App\Models\OrdersLine;
use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public $customer_name;
    public $order_ref;
    public $product_id;
    public $quantity;
    public $products  = [];
    public $productOptions = [];


    public function addProduct()
    {
        $product = Product::find($this->product_id);
        $this->products[] = ['id'=> $this->product_id, 'product_name' => $product->name, 'quantity' => $this->quantity];
        $this->reset(['product_id', 'quantity']);
    }

    public function mount()
    {
        // Cargar los nombres de los productos desde el modelo Product
        $this->loadProductOptions();
    }


    public function loadProductOptions()
    {
        $productsItems = Product::all();

        foreach ($productsItems as $product) {
            $this->productOptions[$product->id] = $product->name;
        }
    }

    public function submitOrder(){
        $this->validate([
            'order_ref' => 'required',
            'customer_name' => 'required',
        ]);

        $order = new Order();
        $order->order_ref = $this->order_ref;
        $order->customer_name = $this->customer_name;
        $order->save();

        foreach($this->products as $line){
            $orderLine = new OrdersLine();
            $orderLine->order_id = $order->id;
            $orderLine->qty = $line['quantity'];
            $orderLine->product_id = $line['id'];
            $orderLine->save();
        }
        return redirect()->route('orders.index')
			->with('message', 'Order successfully created');
    }
   
    public function render()
    {
        return view('livewire.orders.create');
    }
}
