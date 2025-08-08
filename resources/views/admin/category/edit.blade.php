@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Edit Category
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

            <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Category Name</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{!! $category->description !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Status</label>
                        <select name="status" class="form-select">
                            <option value="">--Select Status--</option>
                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Show</option>
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Hide</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-check-label" for="popular">Popular</label><br>
                        <input class="form-check-input" type="checkbox" name="popular"
                            {{ $category->popular == 1 ? 'checked' : '' }}> Check
                        if you want to show as Popular
                    </div>
                    <div class="col-md-12">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                        @if ($category->image)
                            <img src="{{ asset("$image") }}" style="width: 100px; height: 100px;;" alt="Img" />
                        @else
                            No image uploaded
                        @endif
                    </div>
                    <div class="col-md-12 mt-4">
                        <h4>SEO Details</h4>
                    </div>
                    <div class="col-md-12">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{!! $category->meta_description !!}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control">{!! $category->meta_keyword !!}</textarea>
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
