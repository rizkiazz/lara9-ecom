<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandFormRequest;
use App\Models\Brand;
use App\Models\Category;

class BrandController extends Controller
{
    public function index() {
        $brands = Brand::paginate(10);
        $categories = Category::where('status', '0')->get();
        return view('admin.brands.index', compact('brands', 'categories'));
    }
    public function create() {
        $categories = Category::all();
        return view('admin.brands.create', compact('categories'));
    }
    public function store(BrandFormRequest $request)
    {
        $validatedData = $request->validated();
        $brand = new Brand();
        $brand->name = $validatedData['name'];
        $brand->slug = $validatedData['slug'];
        $brand->category_id = $validatedData['category_id'];
        $brand->status = $request->status == true ? '1' : '0';

        $brand->save();

        return redirect('admin/brands')->with('message', 'Brand success added');
    }
    public function edit(int $brand_id) {
        $brand = Brand::findOrFail($brand_id);
        $categories = Category::all();
        return view('admin.brands.edit', compact('brand', 'categories'));
    }
    public function update(BrandFormRequest $request, int $brand_id) {
        $brand = Brand::findOrFail($brand_id);
        $validatedData = $request->validated();
        $brand->name = $validatedData['name'];
        $brand->slug = $validatedData['slug'];
        $brand->category_id = $validatedData['category_id'];
        $brand->status = $request->status == true ? '1' : '0';
        $brand->update();

        return redirect('admin/brands')->with('message', 'Brand success Updated');
    }
    public function destroy(int $brand_id)
    {
        $brand = Brand::findOrFail($brand_id);
        $brand->delete();
        return redirect('admin/brands')->with('message', 'Brand success Deleted');
    }
}
