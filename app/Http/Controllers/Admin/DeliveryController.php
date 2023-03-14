<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Shipping_price;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function AddShippingPrice()
    {
        $city = City::all();
        return view('admin.shipprice.AddShippingPrice', ['title' => 'Thêm phí vận chuyển', 'city' => $city]);
    }

    public function processAddShippingPrice(Request $request)
    {
        $shipprice = new Shipping_price();
        $shipprice->country_id = $request->input('matp');
        $shipprice->price = $request->input('price');
        $shipprice->save();
        return back()->with('status', 'Thêm phí vận chuyển thành công');
    }

    public function EditShippingPrice($id)
    {
        $city = City::all();
        $shipprice = Shipping_price::find($id);
        return view('admin.shipprice.EditShippingPrice', ['title' => 'Chỉnh sửa phí vận chuyển', 'shipprice' => $shipprice, 'city' => $city]);
    }

    public function ProcessEditShippingPrice(Request $request, $id)
    {
        $shipprice = Shipping_price::find($id);
        if($shipprice)
        {
            $shipprice->price = $request->input('price');
            $shipprice->update();
            return back()->with('status', 'Cập nhật thành công');
        }
        return redirect()->back();
    }

    public function DeleteShippingPrice($id)
    {
        Shipping_price::destroy($id);
        return response()->json('Xoá thành công');
    }
}
