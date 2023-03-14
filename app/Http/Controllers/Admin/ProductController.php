<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function AddProducts()
    {
        $category = Category::where('type', 0)->get();
        $brand = Category::where('type', 1)->get();
        return view('admin.products.addProducts', ['title' => 'Thêm sản phẩm', 'categories' => $category, 'brands' => $brand]);
    }

    public function ProcessAddProducts(Request $request)
    {
        $slug = Str::slug($request->input('name_prod'), '-');
        $product = new Product();
        $product->title = $request->input('name_prod');
        $product->price = $request->input('price_prod');
        $product->discount = $request->input('discount_prod');
        $product->stock = $request->input('stock_prod');
        $product->slug = $slug;
        $product->guarantee = $request->input('guarantee_prod');
        $product->category_id = $request->input('type_prod');
        $product->brand_id = $request->input('brand_prod');
        $product->content = $request->input('content');
        $product->benefit = $request->input('benefit');
        $product->description = $request->input('description_prod');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        if($request->hasFile('image_prod'))
        {
            $file = $request->file('image_prod');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->save();

        return back()->with('status', 'Thêm sản phẩm thành công');
    }

    public function EditProducts($id)
    {
        $product = Product::find($id);
        $category = Category::where('type', 0)->get();
        $brand = Category::where('type', 1)->get();
        return view('admin.products.editProducts', ['title' => 'Chỉnh sửa sản phẩm', 'product' => $product, 'categories' => $category, 'brands' => $brand]);
    }

    public function processEditProducts(Request $request, $id)
    {
        $slug = Str::slug($request->input('name_prod'), '-');
        $product = Product::find($id);
        $product->title = $request->input('name_prod');
        $product->price = $request->input('price_prod');
        $product->discount = $request->input('discount_prod');
        $product->stock = $request->input('stock_prod');
        $product->slug = $slug;
        $product->guarantee = $request->input('guarantee_prod');
        $product->category_id = $request->input('type_prod');
        $product->brand_id = $request->input('brand_prod');
        $product->content = $request->input('content');
        $product->benefit = $request->input('benefit');
        $product->description = $request->input('description_prod');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');
        if($request->hasFile('image_prod'))
        {
            $destination = 'uploads/products/'.$product->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image_prod');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->update();

        return back()->with('status', 'Sửa sản phẩm thành công');
    }

    public function RestoreProduct($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return response()->json('Khôi phục thành công');
    }

    public function DeleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json('Xoá thành công, đã di chuyển vào thùng rác');
    }

    public function DeleteProductForever($id)
    {
        Product::where('id', $id)->forceDelete();
        return response()->json('Xoá vĩnh viễn thành công');
    }
}
