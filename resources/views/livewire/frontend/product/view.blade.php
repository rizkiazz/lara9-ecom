<div class="py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="bg-white border">
                    @if ($product->productImages)
                        <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                    @else
                        <img src="{{ asset('uploads/notfound.jpg') }}" alt=""> 
                    @endif
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{ $product->name }}
                        @if ($product->productColors->count() >0)
                            @if ($product->quantity)
                                @if ($this->prodColorSelectedQuantity == 'Out Of Stock')
                                    <label class="btn label-stock bg-danger" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">Out Stock</label>
                                @elseif($this->prodColorSelectedQuantity > 0)
                                    <label class="btn label-stock bg-success" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">In Stock</label>
                                @endif
                            @endif
                        @endif
                    </h4>
                    <hr>
                    <p class="product-path">
                        Home / {{ $product->category->name }} / {{ $product->name }}
                    </p>
                    <div>
                        <span class="selling-price">$ {{ $product->selling_price }}</span>
                        <span class="original-price">$ {{ $product->original_price }}</span>
                    </div>
                    <div class="mt-2">
                        @if ($product->productColors)
                        <div class="form-check form-check-success d-block" style="padding-left: 0;">
                            @foreach ($product->productColors as $colorItem)
                            <label class="form-check-label d-inline-flex flex-wrap" style="margin-right: 10px;">
                                    <a wire:click="colorSelection({{ $colorItem->id }})" class="btn btn2" style="color: {{ $colorItem->color->code }}"> <i class="fa fa-certificate"></i>
                                        {{ $colorItem->color->name }}
                                    </a>
                            </label>
                            
                            @endforeach         
                        </div>  
                        @endif
                        
                    </div>
                    <div class="mt-2">
                        <div class="input-group">
                            <span class="btn btn1"><i class="fa fa-minus"></i></span>
                            <input type="text" value="1" class="input-quantity" />
                            <span class="btn btn1"><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                        <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                    </div>
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            {{ $product->small_description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>