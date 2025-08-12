@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Show Brand
                <a href="{{ url('/admin/categories') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <h4>Brand Name: {{ $brand->name }}</h4>
            <h4>Brand Active: {{ $brand->is_active == 0 ? 'Show' : 'Hide' }}</h4>
            <h4>Brand Image: 
                @if ($brand->image)
                    <img src="{{ asset("$brand->image") }}" style="width: 50px; height: 50px;" class="rounded" alt="img">
                @else
                    No Img
                @endif
            </h4>
        </div>
    </div>
@endsection
