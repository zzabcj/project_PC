<?php

namespace App\Http\Controllers\Admin;

use App\Enums\StatusOrderEnum;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping_price;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $turnover = Order::all()->sum('total_pay');
        $user = User::all()->count();
        $order = Order::all()->count();
        return view('admin.dashboard',['title' => 'Thống kê', 'turnover' => $turnover, 'user' => $user, 'order' => $order]);
    }

    public function Banner()
    {
        $banners = Banner::all();
        return view('admin.banner.Banner', ['title' => 'Quản lý danh mục', 'banners' => $banners]);
    }

    public function Categories()
    {
        $categories = Category::all();
        return view('admin.categories.categories', ['title' => 'Quản lý danh mục', 'categories' => $categories]);
    }

    public function Orders()
    {
        $orders = Order::all();
        $status = StatusOrderEnum::toSelectArray();
        return view('admin.orders.orders', ['title' => 'Quản lý đơn hàng', 'orders' => $orders, 'status' => $status]);
    }

    public function Users()
    {
        $users = User::with('orders')->get();
        return view('admin.users',['title' => 'Quản lý người dùng', 'users' => $users]);
    }

    public function Products()
    {
        $products = Product::all();
        return view('admin.products.products',['title' => 'Quản lý sản phẩm', 'products' => $products]);
    }

    public function TrashProducts()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.products.trashProducts', ['title' => 'Sản phẩm trong thùng rác', 'products' => $products]);
    }

    public function ShippingPrice()
    {
        $shipping_price = DB::table('shipping_prices')->join('devvn_tinhthanhpho','shipping_prices.country_id', '=', 'devvn_tinhthanhpho.matp')->get();
        return view('admin.shipprice.ShipPrice',['title' => 'Quản lý phí vận chuyển', 'shipping_price' => $shipping_price]);
    }

    public function Logout()
    {
        Session::forget('role');
        return redirect()->route('admin.Login');
    }
}
