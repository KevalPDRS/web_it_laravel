@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Edit Brand
                <a href="{{ url('/admin/brands') }}" class="btn btn-danger float-end">Back</a>
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

            <form action="{{ route('brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="">Brand Name</label>
                        <input type="text" name="name"  value="{{ $brand->name }}" class="form-control">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-check-label">Is Active</label><br>
                        <input class="form-check-input" type="checkbox" value="" name="is_active" id="is_active" style="width: 24px; height: 24px;" {{ $brand->is_active == 1 ? 'checked' : '' }}> <label class="form-check-label mt-1" for="is_active"> Check
                            Check if you want to show.</label>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                        @if ($brand->image)
                            <img src="{{ asset("$brand->image") }}" style="width: 100px; height: 100px;" class="mt-1 rounded" alt="Img" />
                        @else
                            No image uploaded
                        @endif
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
