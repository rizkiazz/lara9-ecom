
<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="brandname"><h4>Brands</h4></label>
                            <div class="form-check">
                                @if ($category->brands->count() > 0)
                                    @foreach ($category->brands as $brand_item)
                                    <label class="form-check-label d-block">
                                        <input wire:model="brandInputs" id="brandname" type="checkbox" class="form-check-input" value="{{ $brand_item->name }}" style="width:20px; height:20px">
                                            <h6 class="text-primary">{{ $brand_item->name }}</h6>    
                                    </label>
                                        
                                    @endforeach
                                @else
                                    <h6 class="text-primary">No brands</h6>
                                @endif
                            </div>                    
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="brandname"><h4>Price</h4></label>
                            <div class="form-check">
                                <label class="form-check-label">
                                  <input wire:model="priceInput" type="radio" class="form-check-input" name="priceSort" id="optionsRadios1" value="high-to-low">
                                    <h6 class="text-primary">High to Low</h6>    
                                </label>
                              </div>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input wire:model="priceInput" type="radio" class="form-check-input" name="priceSort" id="optionsRadios2" value="low-to-high">
                                    <h6 class="text-primary">Low to High</h6>    
                                </label>
                              </div>                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product_item)
            
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
            
                            @if ($product_item->quantity > 0)
                            <label class="stock bg-success">In Stock</label>
                            @else
                            <label class="stock bg-danger">Out Stock</label> 
                            @endif
            
                            @if($product_item->productImages->count() > 0)
                            <img src="{{ asset($product_item->productImages[0]->image) }}" alt="Laptop">
                            @else
                            <img src="{{ asset('uploads/products/notfound.jpg') }}" alt="Laptop">
                            @endif
                        </div>
                        <div class="product-card-body">
                            <p class="product-brand">{{ $product_item->brand }}</p>
                            <h5 class="product-name">
                            <a href="{{ url('/collections/'.$product_item->category->slug.'/'.$product_item->slug) }}">
                                    {{ $product_item->name }}
                            </a>
                            </h5>
                            <div>
                                <span class="selling-price">$ {{ $product_item->selling_price }}</span>
                                <span class="original-price">$ {{ $product_item->original_price }}</span>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1">Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                                <a href="" class="btn btn1"> View </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                @empty
                <div class="col-md-4">
                    <div class="product-card">
                        <div class="product-card-img">
                            <img src="{{ asset('uploads/notfound.jpg') }}" alt="">
                        </div>
                        <div class="product-card-body">
                            <h5 class="product-name text-center">No Product Found</h5>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>