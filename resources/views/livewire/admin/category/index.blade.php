<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{  session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Category
                    <a href="{{ url('admin/category/create')}}" class="btn btn-sm btn-primary text-white float-end">Add Category</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 5%">No.</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td style="width :5%">{{ $loop->iteration }}</td>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if ($category->image)
                                    <img src="{{ asset('uploads/category/'.$category->image) }}" style="width: 50px; height:50px" alt="{{ $category->image }}">
                                @else
                                    No image upload
                                @endif
                            </td>
                            <td>{{ $category->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                <a href="{{ url('admin/category/'.$category->id.'/edit') }}" class="btn btn-success">Edit</a>
                                <a href="{{ url('admin/category/'.$category->id) }}" onclick="return confirm('Are You Sure to delete this category?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No Category Available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div>
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>