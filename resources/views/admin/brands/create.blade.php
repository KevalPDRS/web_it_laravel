@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Add Brand
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

            <form action="{{ url('admin/brands') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="">Brand Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-check-label">Is Active</label><br>
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" style="width: 24px; height: 24px;" checked> <label class="form-check-label mt-1" for="is_active"> Check
                            Check if you want to show.</label>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
