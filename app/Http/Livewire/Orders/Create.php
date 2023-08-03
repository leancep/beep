<?php

namespace App\Http\Livewire\Orders;

use App\Models\Order;
use App\Models\OrdersLine;
use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public $customer_name, $order_ref, $product_id, $quantity, $product_name;
    public $products  = [];
    public $productOptions = [];


    public function addProduct()
    {

       // dd($this->order_ref, $this->customer_name, $this->product_id, $this->quantity);
        $product = Product::find($this->product_id);
        $this->products[] = ['id'=> $this->product_id, 'product_name' => $product->name, 'quantity' => $this->quantity];
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
       // dd($this->products, $this->productOptions);
      /*  foreach($this->products as $p){
            dd($p['product_name']);
        }*/
        return view('livewire.orders.create');
    }
}
