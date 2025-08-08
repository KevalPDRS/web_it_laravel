@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Categories
                <a href="{{ url('admin/categories/create') }}" class="btn btn-primary float-end">Add Category</a>
            </h4>
        </div>
        <div class="card-body">

            @session('status')
                <div class="alert alert-success">{{ session('status') }}</div>
            @endsession

            <table class="table table-bordered table-atriped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Popular</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->status == 0 ? 'Show' : 'Hide' }}</td>
                            <td>{{ $item->populer == 1 ? 'Yes' : 'No' }}</td>
                            <td>
                                <a href="{{ route('categories.show', $item->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('categories.delete', $item->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
