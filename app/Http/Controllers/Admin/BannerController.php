<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function AddBanner()
    {
        return view('admin.banner.AddBanner', ['title' => 'Thêm Banner']);
    }

    public function processAddBanner(Request $request)
    {
        $banner = new Banner();
        $banner->type = $request->input('type');
        if($request->hasFile('image_banner'))
        {
            $file = $request->file('image_banner');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/banner/', $filename);
            $banner->image = $filename;
        }
        $banner->active = $request->input('active');
        $banner->save();
        return back()->with('status', 'Thêm thành công');
    }

    public function EditBanner($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.EditBanner', ['title' => 'Chỉnh sửa Banner', 'banner' => $banner]);
    }

    public function processEditBanner(Request $request, $id)
    {
        $banner = Banner::find($id);
        if($request->hasFile('image'))
        {
            $destination = 'uploads/banner/'.$banner->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/banner/', $filename);
            $banner->image = $filename;
        }
        $banner->active = $request->input('active');
        $banner->update();
        return back()->with('status', 'Sửa thành công');
    }

    public function DeleteBanner($id)
    {
        Banner::destroy($id);
        return response()->json('Xoá Banner thành công');
    }
}
