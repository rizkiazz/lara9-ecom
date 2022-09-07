@extends('layouts.admin')
@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{  session('message') }}</div>
            @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Brands List    
                            <a href="{{ url('admin/brands/create') }}" class="btn btn-primary btn-sm text-white float-end" ><i class="mdi mdi-shape-polygon-plus">Add Brands</i></a>
                        </h4>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <table class="table table-bordered table-striped table-hover m-2">
                        <thead>
                            <tr>
                                <th style="width :5%">No.</th>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td style="width :5%">{{ $loop->iteration }}</td>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->category->name }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'hidden' : 'visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/brands/'.$brand->id.'/edit') }}" class="btn btn-success btn-md">Edit</a>
                                        <a href="{{ url('admin/brands/'.$brand->id.'/delete') }}" onclick="return confirm('Are You Sure to delete this brand?')" class="btn btn-danger btn-md">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5" class="text-center">No Branch Found</td>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="mt-3">{{ $brands->links('pagination::bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>

@endsection
 