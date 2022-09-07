@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3> Add Products
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
                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h4 class="card-title">Form Add Product</h4>
                    <p class="card-description">
                    Product info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Enter text...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Product Slug</label>
                                <input name="slug" type="text" class="form-control" id="slug" placeholder="Enter text...">
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
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Select Brand</label>
                                <select name="brand" class="form-control" style="height:45px" id="category_id">
                                    <option>--Select Brand--</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>                           
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="small_description">Small Description</label>
                            <textarea class="form-control" name="small_description" id="small_description" rows="4" placeholder="Enter text..."></textarea>               
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter text..."></textarea>               
                        </div>
                    </div>
                    <p class="card-description">
                    SEO Tags
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input name="meta_title" type="text" class="form-control" id="meta_title" placeholder="Enter text...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="meta_keyword">Meta Keyword</label>
                                <input name="meta_keyword" type="text" class="form-control" id="meta_keyword" placeholder="Enter text...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta_description" rows="4" placeholder="Enter text..."></textarea>               
                        </div>
                    </div>
                    <p class="card-description">
                    Details Product
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="original_price">Original Price</label>
                                <input name="original_price" type="text" class="form-control" id="original_price" placeholder="Enter number...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="selling_price">Sellig Price</label>
                                <input name="selling_price" type="text" class="form-control" id="selling_price" placeholder="Enter number...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input name="quantity" type="text" class="form-control" id="quantity" placeholder="Enter number...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="form-check mx-sm-2">
                                    <label class="form-check-label">
                                        <input id="status" name="status" type="checkbox" class="form-check-input">
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
                                        <input id="trending" name="trending" type="checkbox" class="form-check-input">
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
                                <h5><i class="mdi mdi-chevron-double-right"></i><small class="text-muted">No Colors Founds</small><i class="mdi mdi-chevron-double-left"></i></h5>
                            </div>
                        @endforelse
                    </div>
                    <button type="submit" class="btn btn-primary me-2 text-white">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection