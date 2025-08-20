@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="mb-0">
                Edit Product
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

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <label for="">Product Name</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="">Select Category</label>
                        <select name="category_id" class="form-select">
                            <option value="" selected disabled>-- Select Category</option>
                            @foreach ($categories as $cate)
                                <option value="{{ $cate->id }}"
                                    {{ $cate->id == $product->category_id ? 'selected' : '' }}>{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="">Select Brand</label>
                        <select name="brand_id" class="form-select">
                            <option value="" selected disabled>-- Select Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="">Small Description</label>
                        <textarea name="small_description" rows="2" class="form-control">{!! $product->small_description !!}</textarea>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{!! $product->description !!}</textarea>
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="">Original Price</label>
                        <input type="number" name="original_price" value="{{ $product->original_price }}"
                            class="form-control">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="">Selling Price</label>
                        <input type="number" name="selling_price" value="{{ $product->selling_price }}"
                            class="form-control">
                    </div>
                    <div class="col-md-4 mb-2">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" value="{{ $product->quantity }}" class="form-control">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                        @if ($product->image)
                            <img src="{{ asset("$product->image") }}" style="width: 100px; height: 100px;;" alt="Img" />
                        @else
                            No image uploaded
                        @endif
                    </div>

                    <div class="col-md-6 mb-2">
                        <label class="form-check-label">Is Active</label><br>
                        <input class="form-check-input" type="checkbox" {{ $product->is_active == true ? "checked" : "" }} name="is_active" id="is_active"
                            style="width: 24px; height: 24px;">
                        <label class="form-check-label mt-1" for="is_active"> Check if you want to show.</label>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="form-check-label">Is Trending</label><br>
                        <input class="form-check-input" type="checkbox" {{ $product->is_trending == true ? "checked" : "" }} name="is_trending" id="is_trending"
                            style="width: 24px; height: 24px;">
                        <label class="form-check-label mt-1" for="is_trending">Check if you want it as trending.</label>
                    </div>

                    <div class="col-md-12 mb-2 mt-4">
                        <h4 class="mb-0">SEO Details</h4>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ $product->meta_title }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{!! $product->meta_description !!}</textarea>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="">Meta Keyword</label>
                        <textarea name="meta_keyword" rows="3" class="form-control">{!! $product->meta_keyword !!}</textarea>
                    </div>
                    <div class="col-md-12 mb-2 text-end">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
