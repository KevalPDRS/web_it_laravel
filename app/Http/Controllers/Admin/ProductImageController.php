<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    public function index($productId)
    {
        $product = Product::findOrFail($productId);
        $productImages = ProductImage::where('product_id', $product->id)->get();

        return view('admin.products.images.index', compact('product', 'productImages'));
    }

    public function create($productId)
    {
        $product = Product::findOrFail($productId);

        return view('admin.products.images.create', compact('product'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:png,jpg,webp'
        ]);

        $product = Product::findOrFail($productId);

        $imageData = [];

        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {
                $ext = $file->getClientOriginalExtension();
                $filename = $key . '-' . time() .'.'. $ext;

                $path = 'uploads/product-images/';
                $file->move($path, $filename);

                $imageData[] = [
                    'product_id'=> $product->id,
                    'image'=>$path.$filename
                ];
            }
        }

        ProductImage::insert($imageData);

        return redirect('admin/products/'.$productId.'/images')->with('status','Image uploaded.');
    }

    public function destroy($productId, $imageId)
    {
        $product = Product::findOrFail($productId);
        $productImage = ProductImage::findOrFail($imageId);

        if (File::exists($productImage->image)) {
            File::delete($productImage->image);
        }

        $productImage->delete();

        return redirect('admin/products/'.$productId.'/images')->with('status','Image Deleted.');


    }
}
