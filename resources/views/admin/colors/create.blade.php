@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3> Add Colors
                    <a href="{{ url('admin/colors')}}" class="btn btn-sm btn-primary text-white float-end">Back</a>
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
                <form action="{{ url('admin/colors/') }}" method="POST">
                    @csrf

                    <h4 class="card-title">Form Add Colors</h4>
                    <p class="card-description">
                    Color info
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Color Name</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Enter text...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">Color Code</label>
                                <input name="code" type="text" class="form-control" id="code" placeholder="Enter text...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
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
                    </div>
                    <button type="submit" class="btn btn-primary me-2 text-white">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection