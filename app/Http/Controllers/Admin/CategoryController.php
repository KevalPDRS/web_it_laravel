<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();

            $filename = time() . '.' . $imgExt;
            -$path = 'uploads/category/';
            $file->move($path, $filename);

            $data['image'] = $path . $filename;
        }
        Category::create($data);

        return redirect('/admin/categories')->with('status', 'Category Created');
    }

    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, Category $category)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

            if (File::exists($category->image)) {
                File::delete($category->image);
            }

            $file = $request->file('image');
            $imgExt = $file->getClientOriginalExtension();

            $filename = time() . '.' . $imgExt;
            -$path = 'uploads/category/';
            $file->move($path, $filename);

            $data['image'] = $path . $filename;
        }

        $category->update($data);

        return redirect('/admin/categories')->with('status', 'Category Updated');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/admin/categories')->with('status', 'Category Deleted');
    }
}
