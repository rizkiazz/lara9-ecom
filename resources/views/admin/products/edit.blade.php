@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">

        @if(session('message'))
            <div class="alert alert-success mb-3">{{ session('message') }}</div>
        @endif
        
        <div class="card">
            <div class="card-header">
                <h3> Edit Products
                    <a href="{{ url('admin/products')}}" class="btn btn-sm btn-primary text-white float-end">Back</a>
                </h3>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h4 class="card-title">Form Add Product</h4>
                    <p class="card-description">
                    Product info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Enter text..." value="{{ $product->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Product Slug</label>
                                <input name="slug" type="text" class="form-control" id="slug" placeholder="Enter text..." value="{{ $product->slug }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id">Select Category</label>
                                <select name="category_id" class="form-control" style="height:45px" id="category_id">
                                    <option>--Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Select Product</label>
                                <select name="brand" class="form-control" style="height:45px" id="category_id">
                                    <option>--Select Brand--</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}"  {{ $brand->name == $product->brand ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>                           
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="small_description">Small Description</label>
                            <textarea class="form-control" name="small_description" id="small_description" rows="4" placeholder="Enter text...">{{ $product->small_description }}</textarea>               
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter text...">{{ $product->description }}</textarea>               
                        </div>
                    </div>
                    <p class="card-description">
                    SEO Tags
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input name="meta_title" type="text" class="form-control" id="meta_title" placeholder="Enter text..." value="{{ $product->meta_title }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="meta_keyword">Meta Keyword</label>
                                <input name="meta_keyword" type="text" class="form-control" id="meta_keyword" placeholder="Enter text..." value="{{ $product->meta_keyword }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="4" placeholder="Enter text...">{{ $product->meta_description }}</textarea>               
                        </div>
                    </div>
                    <p class="card-description">
                    Details Product
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="original_price">Original Price</label>
                                <input name="original_price" type="text" class="form-control" id="original_price" placeholder="Enter number..." value="{{ $product->original_price }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selling_price">Sellig Price</label>
                                <input name="selling_price" type="text" class="form-control" id="selling_price" placeholder="Enter number..." value="{{ $product->selling_price }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input name="quantity" type="text" class="form-control" id="quantity" placeholder="Enter number..." value="{{ $product->quantity }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="form-check mx-sm-2">
                                    <label class="form-check-label">
                                        <input id="status" name="status" {{ $product->status == '1' ? 'checked' : '' }} type="checkbox" class="form-check-input">
                                        Default
                                    </label>
                                </div>                    
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="trending">Trending</label>
                                <div class="form-check mx-sm-2">
                                    <label class="form-check-label">
                                        <input id="trending" name="trending" {{ $product->trending == '1' ? 'checked' : '' }} type="checkbox" class="form-check-input">
                                        Default
                                    </label>
                                </div>                    
                            </div>
                        </div>
                    </div>
                    <p class="card-description bold">
                    Upload Image Product
                    </p>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" multiple name="image[]" class="form-control" id="image">
                            </div>
                            <div>
                                @if ($product->productImages)
                                    <div class="row">
                                        @foreach ($product->productImages as $image)
                                        <div class="col-md-2">
                                            <img src="{{ asset($image->image) }}" width="225px" height="100px" class="img-thumbnail mb-3 mt-2 mr-3">
                                            <a class="btn btn-sm btn-danger mb-3 text-white" style="display: flex; justify-content: center; align-content: center;" href="{{ url('admin/product-image/'.$image->id.'/delete') }}">Remove</a>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <h5>No image uploaded</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <p class="card-description bold">
                    Add Color Product
                    </p>
                    <div class="row">
                        <label for="color">Choice Color</label><br>
                        <small class="text-danger mb-3 mt-3">*optional</small>
                        @forelse ($colors as $coloritem)
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-check form-check-success">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="colors[{{ $coloritem->id }}]" value="{{ $coloritem->id }}">
                                        {{ $coloritem->name }}
                                    </label>
                                    <label for="quantity" class="form-control">
                                        <span>Quantity : </span>
                                        <input type="number" name="colorquantity[{{ $coloritem->id }}]" style="border:none; border-radius:5px" id="quantity" width="20px" height="20px" placeholder="only number...">
                                    </label>
                                </div>
                            </div>
                        </div>
                        @empty
                            <div class="col-md-12 text-center">
                                <h2>No Colors Founds</h2>
                            </div>
                        @endforelse
                    </div>
                    <p class="card-description bold">
                    Update Color Product
                    </p>
                    <table class="table table-bordered table-blue">
                        <thead>
                            <tr>
                                <th>Color Name</th>
                                <th>Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->productColors as $prodColor)
                            <tr class="prod-color-tr">
                                <td>
                                    @if ($prodColor->color)
                                        {{ $prodColor->color->name }}
                                    @else
                                        <h4 class="text-center text-gray">No Color Found</h4>
                                    @endif
                                    
                                </td>
                                <td>
                                    <div class="form-check form-check-success">
                                        <label for="quantityColor" class="form-control">
                                            <span>Quantity : </span>
                                            <input class="productColorQuantity" type="number" value="{{ $prodColor->quantity }}" style="border:none; border-radius:5px" id="quantityColor" width="20px" height="20px" placeholder="only number...">
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" value="{{ $prodColor->id }}" class="updateProductColorBtn btn btn-warning">Update</button>
                                    <button type="button" value="{{ $prodColor->id }}" class="deleteProductColorBtn btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                    <button type="submit" class="btn btn-primary me-2 text-white">Update</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
    <script>

        $(document).ready(function (){

            // X-CSRF-TOKEN
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $(document).on('click', '.updateProductColorBtn', function(){
                var product_id = "{{ $product->id }}";
                var prod_color_id = $(this).val();
                var qty = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();

                // alert(prod_color_id);
                if(qty <= 0){
                    alert('Quantity is required');
                    return false;
                };

                $.ajax({
                    type: "POST",
                    url: "/admin/product-color/"+prod_color_id,
                    data: data = {
                        'product_id': product_id,
                        'qty': qty
                    }
                    // success: function (response){
                    //     alert(response.message)
                    // }
                }).done(function( response ) {
                    alert( response.message );
                
                }).fail(function() {
                    alert( "Request failed!!! " );
                });;

            });

            $(document).on('click', '.deleteProductColorBtn', function(){
                var prod_color_id = $(this).val();
                var thisClick = $(this);

                $.ajax({
                    type: "GET",
                    url: "/admin/product-color/"+prod_color_id+"/delete"
                }).done(function( response ) {
                    thisClick.closest('.prod-color-tr').remove();
                    alert( response.message );
                
                }); 
                    // success: function (response){
                    //     thisClick.closest('.prod-color-tr').remove();
                    //     alert(response.message)
                    // }
            });
        });

    </script>

@endsection