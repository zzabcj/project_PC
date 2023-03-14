<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function OrderProduct($id)
    {
        $ord_prod = OrderDetail::where('order_id', $id)->get();
        foreach($ord_prod as $product){
            $output = '
                    <div class="row">
                        <div class="col-md-2">
                            <img src="'.asset('uploads/products/'.$product->product_image).'" alt="" width="120" height="120" style="object-fit: cover">
                        </div>
                        <div class="col-md-10">
                            <p class="fs-5">'. $product->product_name .'</p>
                            <span class="fs-5">Số lượng: '.$product->quantity.' ,đơn giá: '.number_format($product->price).'đ</span>
                        </div>
                    </div>
                    <hr class="border border-danger border-2 opacity-50">
            ';
            echo $output;
        }
    }

    public function updateStatus(Request $request)
    {
        $order = Order::find($request->id);
        if($order){
            $order->status = $request->stt;
            $order->save();
            return response()->json(['status' => 'Cập nhật trạng thái đơn hàng thành công'], 200);
        }
        return response()->json(['status' => 'Cập nhật trạng thái đơn hàng thất bại'], 400);
    }
}
