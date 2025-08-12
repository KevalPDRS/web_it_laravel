@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Add Category
                <a href="{{ url('/admin/categories') }}" class="btn btn-danger float-end">Back</a>
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

            <form action="{{ url('admin/categories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Category Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <select name="status" class="form-select">
                            <option value="">--Select Status--</option>
                            <option value="0">Show</option>
                            <option value="1">Hide</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-check-label">Popular</label><br>
                        <input class="form-check-input" type="checkbox" name="popular" id="popular" style="width: 24px; height: 24px;" checked> <label class="form-check-label mt-1" for="popular">  Check
                        if you want to show as Popular</label>
                    </div>
                    <div class="col-md-12">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mt-4">
                        <h4>SEO Details</h4>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
