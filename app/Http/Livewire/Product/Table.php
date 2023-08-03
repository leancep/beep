<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class Table extends Component
{
    public $products, $name, $cost, $productToEdit;
 
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products.table');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'cost' => 'required',
        ]);
   
        Product::updateOrCreate(['id' => $this->product_id], [
            'name' => $this->name,
            'cost' => $this->cost
        ]);
  
        session()->flash('message', 
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.');
  
        $this->resetInputFields();
    }

    public function productToEdit($id)
    {
        $this->productToEdit = Product::find($id);
        $this->emit('editProduct', $this->productToEdit->id);
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }
}