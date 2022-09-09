<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity;

    public function colorSelection($productColorId)
    {
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if($this->prodColorSelectedQuantity == 0){
            $this->prodColorSelectedQuantity = 'Out Of Stock';
        }
    }

    public function mount($category, $product)
    {

        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        // var_dump($this->category);
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
