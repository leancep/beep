<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public $products, $name, $cost, $product_id;
    public $isOpen = 0;
 
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.products.table');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
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
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $this->name = $product->name;
        $this->cost = $product->cost;
       
        $this->openModal();
    }

    private function resetInputFields(){
        $this->name = '';
        $this->cost = 0;
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('message', 'Product Deleted Successfully.');
    }
}