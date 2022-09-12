<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h4>My Cart</h4><hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">
                        
                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Color</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-3">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>

                        @forelse ($cart as $cart_item)
                            @if($cart_item->product)
                                
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-3 my-auto">
                                            <a href="{{ url('collections/'.$cart_item->product->category->slug.'/'.$cart_item->product->slug) }}">
                                                <label class="product-name">
                                                    @if ($cart_item->product->productImages)
                                                        
                                                    <img src="{{ asset($cart_item->product->productImages[0]->image) }}" style="width: 50px; height: 50px" alt="">
                                                    {{ $cart_item->product->name }}
                                                    @else
                                                       <img src="{{ asset('uploads/notfound.jpg') }}" style="width: 50px; height: 50px" alt=""> 
                                                    @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-1 my-auto">
                                        @if ($cart_item->productColor)
                                            @if ($cart_item->productColor->color)
                                            <label class="btn btn-sm" style="background: {{ $cart_item->productColor->color->name }}">{{ $cart_item->productColor->color->name }}</label>
                                            @endif
                                        @else
                                            <label class="color">No color</label>
                                        @endif
                                        </div>
                                        <div class="col-md-1 my-auto">
                                            <label class="price">$ {{ $cart_item->product->selling_price }}</label>
                                            @php
                                                $totalPrice += $cart_item->product->selling_price
                                            @endphp
                                        </div>
                                        <div class="col-md-3 col-9 my-auto float-end">
                                            <div class="quantity">
                                                <div class="input-group">
                                                    <button wire:loading.attr="disabled" wire:click="decrementQuantity({{ $cart_item->id }})" type="button" class="btn btn1"><i class="fa fa-minus"></i></button>
                                                    <input type="text" value="{{ $cart_item->quantity }}" class="input-quantity" />
                                                    <button wire:loading.attr="disabled" wire:click="incrementQuantity({{ $cart_item->id }})" type="button" class="btn btn1"><i class="fa fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="total">${{ $cart_item->product->selling_price * $cart_item->quantity }} </label>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <div class="remove">
                                                <button wire:loading.attr="disabled" wire:click="removeCartItem({{ $cart_item->id }})" type="button" class="btn btn-danger btn-sm">
                                                    <span wire:loading.remove wire:target="removeCartItem({{ $cart_item->id }})">
                                                        <i class="fa fa-trash"></i> Remove
                                                    </span>
                                                    <span wire:loading wire:target="removeCartItem({{ $cart_item->id }})">
                                                        <i class="fa fa-trash"></i> Removing...<i class="fa fa-spinner"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            @endif
                        @empty
                        <div class="cart-item">
                            <div class="col-md-12">
                                <h4>No Cart Found</h4>
                            </div>
                        </div>
                        @endforelse
                                
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                    <h5>
                        Get the best deals & Offers <a href="{{ url('/collections') }}">Shop Now</a>
                    </h5>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4>
                            Total :
                            <span>$ {{ $totalPrice }}</span>
                        </h4>
                        <hr>
                        <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">Checkout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
