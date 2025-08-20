@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Show Product
                <a href="{{ url('/admin/products') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <h4>Product Name: {{ $product->name }}</h4>
            <h4>Product Small Description: {{ $product->small_description }}</h4>
            <h4>Product Description: {{ $product->description }}</h4>
        </div>
    </div>
@endsection
