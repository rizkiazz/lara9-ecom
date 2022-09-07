@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Sliders
                    <a href="{{ url('admin/sliders/create')}}" class="btn btn-sm btn-primary text-white float-end">Add Sliders</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width :5%">No.</th>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                            <tr>
                                <td style="width :5%">{{ $loop->iteration }}</td>
                                <td style="width :5%">{{ $slider->id }}</td>
                                <td style="width :20%">{{ substr($slider->title,0,50).'...' }}</td>
                                <td style="width :20%">                                 
                                    {{ substr($slider->description,0,50).'...' }}
                                </td>
                                <td>
                                    @if ($slider->image)
                                        <img src="{{ asset('uploads/sliders/'.$slider->image) }}" style="width: 70px; height:70px" alt="{{ $slider->image }}">
                                    @else
                                        No image upload
                                    @endif
                                </td>
                                <td>{{ $slider->status == '1' ? 'hidden' : 'visible' }}</td>
                                <td>
                                    <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('admin/sliders/'.$slider->id).'/delete' }}" onclick="return confirm('Are You Sure to delete this slider?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No slider Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $sliders->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection