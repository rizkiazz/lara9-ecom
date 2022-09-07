
<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <label for="" class="dblock">Hello</label>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $product_item)
            
                <div class="col-md-3">
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
                <div class="col-md-3">
                    <h4>No Product Found</h4>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>