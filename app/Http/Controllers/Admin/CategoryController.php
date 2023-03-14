<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function AddCategories()
    {
        return view('admin.categories.addCategories', ['title' => 'Thêm danh mục']);
    }

    public function processAddCategories(Request $request)
    {
        $category = new Category();
        $category->type = $request->input('type_cate');
        $category->title = $request->input('name_cate');
        $category->active = $request->input('show_cate');
        if($request->hasFile('image_cate'))
        {
            $file = $request->file('image_cate');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/categories/', $filename);
            $category->thumbnail = $filename;
        }
        $category->save();

        return back()->with('status', 'Thêm danh mục thành công');
    }

    public function EditCategories($id)
    {
        $cate = Category::find($id);
        return view('admin.categories.editCategories', ['title' => 'Chỉnh sửa danh mục', 'category' => $cate]);
    }

    public function processEditCategories(Request $request, $id)
    {
        $category = Category::find($id);
        $category->type = $request->input('type_cate');
        $category->title = $request->input('name_cate');
        $category->active = $request->input('show_cate');
        if($request->hasFile('image_cate'))
        {
            $destination = 'uploads/categories/'.$category->thumbnail;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image_cate');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/categories/', $filename);
            $category->thumbnail = $filename;
        }
        $category->update();

        return back()->with('status', 'Sửa danh mục thành công');
    }

    public function DeleteCategories($id)
    {
        Category::destroy($id);
        return response()->json('Xoá danh mục thành công');
    }
}
