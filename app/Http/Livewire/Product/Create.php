<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Create extends Component
{
    public $product, $name, $cost;
    public function render()
    {
        return view('livewire.products.create');
    }

    public function clearInputs(){
        $this->name = '';
        $this->cost = '';
    }

    public function storeProduct(){
        $this->validate([
            'name' => 'required',
            'cost' => 'required',
        ]);
        $this->product = new Product();
        $this->product->name = $this->name;
        $this->product->cost = $this->cost;
        $this->product->save();
        return redirect()->route('products.index')
			->with('message', 'Product successfully created');
    }
}
