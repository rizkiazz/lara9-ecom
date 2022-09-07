{{-- @extends('layouts.admin')
@section('content')
    <div>
        @include('livewire.admin.brand.modal-form')

        <div class="row">
            <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{  session('message') }}</div>
            @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Brands List    
                            <a href="#" class="btn btn-primary btn-sm text-white float-end" data-bs-toggle="modal" data-bs-target="#addBrand"><i class="mdi mdi-shape-polygon-plus">Add Brands</i></a>
                        </h4>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <table class="table table-bordered table-striped table-hover m-2">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td>{{ $brand->status == '1' ? 'hidden' : 'visible' }}</td>
                                    <td>
                                        <a href="" wire:click="editBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#updateBrand" class="btn btn-success btn-md">Edit</a>
                                        <a href="" wire:click="deleteBrand({{ $brand->id }})" data-bs-toggle="modal" data-bs-target="#deleteBrand" class="btn btn-danger btn-md">Delete</a>
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

    @push('script')
        <script>
            window.addEventListener('close-modal', event => {
                $('#addBrand').modal('hide');
                $('#updateBrand').modal('hide');
                $('#deleteBrand').modal('hide');
            });

        </script>
        
    @endpush

@endsection
  --}}