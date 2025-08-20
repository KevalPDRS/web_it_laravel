<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Product\CreateProductFormRequest;
use App\Http\Requests\Product\UpdateProductFormRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    public function store(CreateProductFormRequest $request)
    {
        $data = $request->validated();

        $item_name = $request->post('name');

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();

            $filename = time() . '.' . $imgExt;
            $path = 'uploads/products/';
            $file->move($path, $filename);

            $data['image'] = $path . $filename;
        }
        Product::create($data);

        return redirect('/admin/products')->with('status', 'Category ' . $item_name . ' Created');
    }

    public function show(Product $product)
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.products.show', compact('product', 'categories', 'brands'));
    }

    public function edit(Product $product)
    {
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(UpdateProductFormRequest $request, Product $product)
    {
        $data = $request->validated();

        $item_name = $product->name;

        if ($request->hasFile('image')) {

            if (File::exists($product->image)) {
                File::delete($product->image);
            }

            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();

            $filename = time() . '.' . $imgExt;
            $path = 'uploads/products/';
            $file->move($path, $filename);

            $data['image'] = $path . $filename;
        }

        $product->update($data);

        return redirect('/admin/products')->with('status', 'Product ' . $item_name . ' Updated');
    }

    public function destroy($id)
    {

        $product = Product::findOrFail($id);

        $item_name = $product->name;

        if (File::exists($product->image)) {
            File::delete($product->image);
        }
        $product->delete();

        return redirect('/admin/products')->with('status', 'Product ' . $item_name . ' Deleted');
    }
}
