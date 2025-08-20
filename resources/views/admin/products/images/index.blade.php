@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Products Images of "{{ $product->name }}"
                <a href="{{ url('admin/products') }}" class="btn btn-danger ms-2 float-end">Back</a>
                <a href="{{ url('admin/products/' . $product->id . '/images/create') }}"
                    class="btn btn-primary ms-2 float-end">Upload Image</a>
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
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productImages as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                @if ($item->image)
                                    <img src="{{ asset("$item->image") }}" style="height: 100px; max-width:100px;"
                                        alt="Img" />
                                @else
                                    No image uploaded
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-danger"
                                    href="{{ url('admin/products/' . $product->id . '/images/' . $item->id . '/delete') }}"
                                    onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
