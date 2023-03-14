<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Province;
use App\Models\Shipping_price;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
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

        $carts = DB::table('carts')->where('user_id', Auth::user()->getAuthIdentifier())->join('products', 'carts.product_id', '=', 'products.id')->get();

        return view('cart.index', ['title' => 'Giỏ hàng', 'carts' => $carts])
            ->with(compact('meta_keyword', 'meta_description', 'meta_url'));
    }

    public function indexCheckout(Request $request)
    {
        $meta_keyword = '';
        $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
        $meta_url = $request->url();

        $carts = DB::table('carts')->where('user_id', Auth::user()->getAuthIdentifier())->join('products', 'carts.product_id', '=', 'products.id')->get();
        $cities = City::orderby('matp', 'ASC')->get();
        return view('cart.checkout.index', ['title' => 'Check Out', 'carts' => $carts, 'cities' => $cities])
            ->with(compact('meta_keyword', 'meta_description', 'meta_url'));
    }

    public function getProvince(Request $request)
    {
        $data = $request->all();
        $output = '';
        $provinces = Province::where('matp', $data['matp'])->orderby('maqh', 'ASC')->get();
        $output .= '<option>Quận/Huyện</option>';
        foreach($provinces as $province){
            $output .= '<option value="'.$province->maqh.'">'.$province->name.'</option>';
        };
        echo $output;
    }

    public function getShippingPrice(Request $request)
    {
        $data = $request->all();
        $shipping_price = Shipping_price::where('country_id', $data['matp'])->get();
        echo number_format($shipping_price[0]->price).'đ';
    }

    public function AddToCart(Request $request)
    {
            $stock = Product::where('id', $request->id)->first();
            $cart = Cart::where('product_id', $request->id)->where('user_id', Auth::user()->getAuthIdentifier())->first();
            if($stock->stock){
                if($cart){
                    $quantity = $cart->quantity;
                    $quantity_updated = $quantity+1;
                    Cart::where('product_id', $request->id)->where('user_id', Auth::user()->getAuthIdentifier())
                        ->update(['quantity' => $quantity_updated]);
                } else {
                    Cart::create([
                        'user_id' => Auth::user()->getAuthIdentifier(),
                        'product_id' => $request->id,
                        'quantity' => 1,
                    ]);
                }
            } else {
                return response()->json('Sản phẩm đã hết hàng', 404);
            }

            $cart_quantity = Cart::where('user_id', Auth::user()->getAuthIdentifier())->count();

            return response()->json(['status' => 'Thêm vào giỏ hàng thành công', 'cart_quantity' => $cart_quantity], 200);
        }

    public function BuyNow(Request $request)
    {
        $stock = Product::where('id', $request->id)->first();
        $cart = Cart::where('product_id', $request->id)->where('user_id', Auth::user()->getAuthIdentifier())->first();
        if($stock->stock){
            if($cart){
                $quantity = $cart->quantity;
                $quantity_updated = $quantity+1;
                Cart::where('product_id', $request->id)->where('user_id', Auth::user()->getAuthIdentifier())->update(['quantity' => $quantity_updated]);
            } else {
                Cart::create([
                    'user_id' => Auth::user()->getAuthIdentifier(),
                    'product_id' => $request->id,
                    'quantity' => 1,
                ]);
            }
        } else {
            return response()->json('Sản phẩm đã hết hàng', 404);
        }

        return redirect()->route('cart');
    }

    public function UpdateQuantity($type, $id)
    {
        $cart = Cart::where('product_id', $id)->where('user_id', Auth::user()->getAuthIdentifier())->first();
        if($type == 'Dec')
        {
            if($cart->quantity == 1)
            {
                Cart::destroy($cart->id);
            }
            else
            {
                $quantity = $cart->quantity;
                $quantity_updated = $quantity-1;
                Cart::where('product_id', $id)->where('user_id', Auth::user()->getAuthIdentifier())->update(['quantity' => $quantity_updated]);
                return response()->json(['cart_quantity' => $quantity_updated]);
            }
        }
        elseif($type == 'Inc')
        {
            $stock = Product::where('id', $id)->first();
            $quantity = $cart->quantity;
            if($quantity < $stock->stock)
            {
                $quantity_updated = $quantity+1;
                Cart::where('product_id', $id)->where('user_id', Auth::user()->getAuthIdentifier())->update(['quantity' => $quantity_updated]);
            }
        }

        else
        {
            Cart::destroy($cart->id);
        }

//        return redirect()->back();
    }

//    public function sendOrderConfirmationMail($order, $orderitem)
//    {
//    }

    public function CheckOut(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::user()->getAuthIdentifier();
        $order->method_pay = $request->input('method_pay');
        $order->name_receiver = $request->input('name_receiver');
        $order->phone_receiver = $request->input('phone_receiver');
        $order->email_receiver = $request->input('email_receiver');

        $city = City::where('matp', $request->input('city'))->first();
        $province = Province::where('maqh', $request->input('province'))->first();

        $order->address_receiver = $request->input('address_receiver'). ' ' .$province->name. ' ' .$city->name;
        $order->total_pay = $request->input('total_pay');
        $order->shipping_price = $request->input('shipping_price');
        $order->status = 0;

        $order->save();
        $cartitems = Cart::where('user_id', Auth::user()->getAuthIdentifier())->get();
        foreach ($cartitems as $item)
        {
            $prod = Product::where('id', $item->product_id)->first();
            $price = $prod->price * (100-$prod->discount)/100;
            if($prod->stock >= $item->quantity)
                {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'user_id' => Auth::user()->getAuthIdentifier(),
                        'product_id' => $prod->id,
                        'product_name' => $prod->title,
                        'product_image' => $prod->image,
                        'product_slug' => $prod->slug,
                        'quantity' => $item->quantity,
                        'price' => ceil($price),
                    ]);

                    $prod->stock = $prod->stock - $item->quantity;
                    $prod->total_sell = $prod->total_sell + $item->quantity;
                    $prod->update();
                }
            else {
                return redirect()->back();
            }
        }
        Mail::to($order->email_receiver)->send(new OrderMail($order));

//        $this->sendOrderConfirmationMail($order, $orderitem);

        $cartitems = Cart::where('user_id', Auth::user()->getAuthIdentifier())->get();
        Cart::destroy($cartitems);

        return redirect()->route('paymentsuccess');
    }

}
