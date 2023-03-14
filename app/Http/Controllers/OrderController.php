<?php

namespace App\Http\Controllers;

use App\Enums\StatusOrderEnum;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $meta_keyword = '';
        $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
        $meta_url = $request->url();

        $orders = Order::with('order_detail')->paginate(3)->through(function ($products){
            return $products;
        });
        return view('user.userorder', ['title' => 'Đơn hàng đã đặt', 'orders' => $orders])
            ->with(compact('meta_keyword', 'meta_description', 'meta_url'));
    }

    public function CancelOrder($id)
    {
        $order = Order::where('id', $id)->first();
        if($order->status == 0) {
            $order->status = StatusOrderEnum::DAHUY;
            $order->update();
            return response()->json('Huỷ đơn hàng thành công', 200);
        }
        return response()->json('Huỷ đơn hàng thất bại', 404);

    }
}
