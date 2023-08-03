<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public $product;
    public $name;
    public $cost;

    public function mount(Product $product){
        $this->product = $product;
        $this->name = $product->name;
        $this->cost = $product->cost;
    }

    public function clearInputs(){
        $this->name = '';
        $this->cost = '';
    }

    public function updateProduct(){
        $this->product->name = $this->name;
        $this->product->cost = $this->cost;
        $this->product->save();
        return redirect()->route('products.index')
			->with('message', 'Product successfully updated');
    }

    public function render()
    {   
        return view('livewire.products.form-edit');
    }
}
