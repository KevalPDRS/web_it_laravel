@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Upload Images for "{{ $product->name }}"
                <a href="{{ url('/admin/products') }}" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            @if ($errors->all())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('admin/products/' . $product->id . '/images') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="">Upload Multiple Images (Max: 12 files)</label>
                        <input type="file" name="images[]" multiple class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
