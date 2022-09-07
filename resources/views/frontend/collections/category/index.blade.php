@extends('layouts.app')

@section('title', 'All Category')
    
@section('content')

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>

                @forelse ($categories as $category_item)
                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="{{ url('/collections/'.$category_item->slug) }}">
                            <div class="category-card-img">
                                <img src="{{ asset('uploads/category/'.$category_item->image) }}" class="w-100" alt="Laptop">
                            </div>
                            <div class="category-card-body">
                                <h5>{{ $category_item->name }}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <h4>No Category Found</h4>
                </div>
                @endforelse
            </div>
        </div>
    </div>


@endsection