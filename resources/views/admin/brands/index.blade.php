@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Brands
                <a href="{{ url('admin/brands/create') }}" class="btn btn-primary float-end">Add Brand</a>
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
                        <th>Brand Name</th>
                        <th>Image</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->image)
                                    <img src="{{ asset("$item->image") }}" style="width: 50px; height: 50px;" class="rounded" alt="img">
                                @else
                                    No Img
                                @endif

                            </td>
                            <td>{{ $item->is_active == 1 ? 'Show' : 'Hide' }}</td>
                            <td>
                                <a href="{{ route('brands.show', $item->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('brands.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ route('brands.delete', $item->id) }}" onclick="return confirm('Are you sure?')"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
