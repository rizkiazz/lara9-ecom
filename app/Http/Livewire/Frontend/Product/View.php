<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Cart;
use App\Models\WishList;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $productColorId;
    public $quantityCount = 1;

    public function incrementQuantity()
    {
        if($this->quantityCount < 10){

            $this->quantityCount++;
        }
    }
    public function decrementQuantity()
    {
        if($this->quantityCount > 1){

            $this->quantityCount--;
        }
    }
    public function addToCart(int $productId)
    {
        if (Auth::check()){

            //check product+id in availabale or not?
            if($this->product->where('id', $productId)->where('status', '0')->exists()){

                // check for product color quantity available or not
                // if available insert to cart
                if ($this->product->productColors()->count() > 1) {
                    
                    //if available productColorQuantity not null
                    //get first
                    if ($this->prodColorSelectedQuantity != NULL) {

                        if (Cart::where('user_id', auth()->user()->id)
                                ->where('product_id', $productId)
                                ->where('product_color_id', $this->productColorId)
                                ->exists()) {

                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product already added to cart',
                            'type' => 'warning',
                            'status' => 200
                        ]);
                        
                        } else {
                            # code...
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();

                            if($productColor->quantity > 0){

                                if ($productColor->quantity > $this->quantityCount){
                                    //insert product to cart
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' =>$productId,
                                        'product_color_id' =>$this->productColorId,
                                        'quantity' =>$this->quantityCount
                                    ]);
                                    $this->emit('cartAddedUpdated');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Success Added Product to cart',
                                        'type' => 'success',
                                        'status' => 404
                                    ]);
            
                                }else{
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only '.$productColor->quantity.'Quantity available',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }

                            }else{
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of Stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }

                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select You Product Color',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                    
                } else {
                    
                    if (Cart::where('user_id', auth()->user()->id)
                            ->where('product_id', $productId)
                            ->exists()) {

                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Product already added to cart',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                    }else{

                        if ($this->product->quantity > 0){
                            
                            if ($this->product->quantity > $this->quantityCount){
                                //insert product to cart
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' =>$productId,
                                    'quantity' =>$this->quantityCount
                                ]);
                                $this->emit('cartAddedUpdated');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Success Added Product to cart',
                                    'type' => 'success',
                                    'status' => 404
                                ]);
        
                            }else{
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only '.$this->product->quantity.'Quantity available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
            
                        }else{
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of Stock',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }

                }
                
            }else{
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product doesn`t exists',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        
        }else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to Continue',
                'type' => 'error',
                'status' => 401
            ]);
        }
    }

    public function addToWishList($productId)
    {
        if (Auth::check()) 
        {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'You Already added to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'You Already added to wishlist',
                    'type' => 'warning',
                    'status' => 404
                ]);
                return false;
            } else {
                WishList::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);
                $this->emit('wishlistaAddedUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Wishlist added successfully',
                    'type' => 'success',
                    'status' => 200
                ]);
                session()->flash('message', 'Wishlist added successfully');
            }
            
        } else {
            session()->flash('message', 'Please Login to Continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to Continue',
                'type' => 'error',
                'status' => 401
            ]);
            return false;
        }
        
    }
    public function colorSelection($productColorId)
    {
        $this->productColorId = $productColorId;
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
