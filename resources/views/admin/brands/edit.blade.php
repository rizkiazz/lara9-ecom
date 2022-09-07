@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3> Edit Brands
                    <a href="{{ url('admin/brands')}}" class="btn btn-sm btn-primary text-white float-end">Back</a>
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
                <form action="{{ url('admin/brands/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h4 class="card-title">Form Edit Brands</h4>
                    <p class="card-description">
                    Brands info
                    </p>
                    <div class="row">
                        <div class="col-md-12">
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Brand Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Enter text..." value="{{ $brand->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Brand Slug</label>
                                <input name="slug" type="text" class="form-control" id="slug" placeholder="Enter text..." value="{{ $brand->slug }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <div class="form-check mx-sm-2">
                                    <label class="form-check-label">
                                        <input id="status" name="status" type="checkbox" class="form-check-input" {{ $brand->status == '1' ? 'checked' : '' }}>
                                        Default
                                    </label>
                                </div>                    
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-2 text-white">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection