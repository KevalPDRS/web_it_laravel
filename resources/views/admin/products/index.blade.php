@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Products
                <a href="{{ url('admin/products/create') }}" class="btn btn-primary float-end">Add Product</a>
            </h4>
        </div>
        <div class="card-body">

            @session('status')
                <div class="alert alert-success">{{ session('status') }}</div>
            @endsession

            <table class="table table-bordered table-atriped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Is Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                {{ $item->name }}
                                @if ($item->category_id)
                                    <br><b>Category:</b> {{ $item->category->name }}
                                @endif
                                @if ($item->brand_id)
                                    <br><b>Brand:</b> {{ $item->brand->name }}
                                @endif
                            </td>
                            <td>
                                @if ($item->image)
                                    <img src="{{ asset("$item->image") }}" style="height: 100px; max-width:100px;"
                                        alt="Img" />
                                @else
                                    No image uploaded
                                @endif
                            </td>
                            <td>{{ $item->is_active == 1 ? 'Yes' : 'No' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('products.show', $item->id) }}">Show</a></li>
                                        <li><a class="dropdown-item" href="{{ route('products.edit', $item->id) }}">Edit</a></li>
                                        <li><a class="dropdown-item" href="{{ url('admin/products/'.$item->id.'/images') }}">Upload Images</a></li>
                                        <li><a class="dropdown-item" href="{{ route('products.delete', $item->id) }}" onclick="return confirm('Are you sure?')">Delete</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
