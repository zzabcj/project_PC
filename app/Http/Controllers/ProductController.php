<?php

namespace App\Http\Controllers;

use App\Enums\StatusOrderEnum;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function AllProduct(Request $request){
        $meta_keyword = '';
        $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
        $meta_url = $request->url();

        $max_price = Product::max('price') - 100000;
        $min_price = Product::min('price') + 100000;

        $val_min = (request()->start_price) ? request()->start_price : $min_price;
        $val_max = (request()->end_price) ? request()->end_price : $max_price;

        $products = Product::with('reviews')
            ->search()->whereBetween('price', [$val_min, $val_max])
            ->filterDevice()
            ->filterBrand()
            ->sort()
            ->paginate(6)
            ->withQueryString()
            ->through(function ($product){
                return $product;
            });

        $categories_brand = Category::where('type','=',0)->where('active', 1)->get();
        $categories_type = Category::where('type','=',1)->where('active', 1)->get();
        return view('product.index',
            ['title' => 'Tất cả sản phẩm',
                'products' => $products,
                'categories_brand' => $categories_brand,
                'categories_type' => $categories_type,
                'max_price' => $max_price,
                'min_price' => $min_price,
                'val_min' => $val_min,
                'val_max' => $val_max,
            ])->with(compact('meta_keyword', 'meta_description', 'meta_url'));
    }

    public function HomeProduct(Request $request){
        $meta_keyword = '';
        $meta_description = 'Minh Ấn Computer - Chuyên Cung Cấp Server, Máy Tính Đồ Họa, PC Workstation, Linh Kiện Máy Tính, computer. Minh Ấn Computer Giao hàng trên toàn quốc, tư vấn tận tình, miễn phí.';
        $meta_url = $request->url();

        $banner = Banner::where('type', 1)->where('active', 1)->get();
        $event = Banner::where('type', 2)->where('active', 1)->get();

        $homeProducts = Category::with('products')->where('type', 0)->where('active', '=', 1)->get()->map(function ($homeProduct){
            $homeProduct->setRelation('products', $homeProduct->products->take(6)->sortBy('stock'));
            return $homeProduct;
        });

        $hotProducts = Product::all()->take(6)->sortByDesc('total_sell');
        return view('home.index',['title' => 'Shop PC', 'homeProducts' => $homeProducts, 'hotProducts' => $hotProducts,'banner' => $banner, 'event' => $event])
            ->with(compact('meta_keyword', 'meta_description', 'meta_url'));
    }

    public function LiveSearchProduct($k){
        $products = Product::where('title', 'like', '%'.$k.'%')->get();
            foreach($products as $product)
            {
                $output = '
                                <a href="'.route('detail',$product->slug).'" class="text-dark">
                                   <div class="nav-search-item row p-3">
                                        <div class="col-md-2">
                                                <img src="'.asset("uploads/products/".$product->image).'" alt="" width="75" height="75">
                                        </div>
                                        <div class="col-md-10">
                                            <span>'.$product->title.'</span><br>
                                            <span class="me-2"><del>'.number_format($product->price).'đ</del></span>
                                           <span class="text-danger">'.number_format($product->price - ($product->price * $product->discount/100)).'đ</span>
                                        </div>
                                   </div>
                                </a>
            ';
                echo $output;
            }
    }

    public function ProductDetail(Request $request, $slug){
        $productDetail = Product::where('slug', $slug)->first();
        $total_price = $productDetail->price - ($productDetail->price * $productDetail->discount / 100);
        $rating = $productDetail->reviews->count() > 0 ?  round($productDetail->reviews->sum('star')/$productDetail->reviews->count(), 1) : 0;
        $rating_5_width = $productDetail->reviews->where('star', 5)->count() ? ($productDetail->reviews->where('star', 5)->count() / $productDetail->reviews->count()) * 100 : 0;
        $rating_4_width = $productDetail->reviews->where('star', 4)->count() ? ($productDetail->reviews->where('star', 4)->count() / $productDetail->reviews->count()) * 100 : 0;
        $rating_3_width = $productDetail->reviews->where('star', 3)->count() ? ($productDetail->reviews->where('star', 3)->count() / $productDetail->reviews->count()) * 100 : 0;
        $rating_2_width = $productDetail->reviews->where('star', 2)->count() ? ($productDetail->reviews->where('star', 2)->count() / $productDetail->reviews->count()) * 100 : 0;
        $rating_1_width = $productDetail->reviews->where('star', 1)->count() ? ($productDetail->reviews->where('star', 1)->count() / $productDetail->reviews->count()) * 100 : 0;

        $product_buy_with = Product::where('category_id', '!=', $productDetail->category_id)->inRandomOrder()->limit(2)->get();
        $product_relate = Product::where('category_id', '=', $productDetail->category_id)->inRandomOrder()->limit(6)->get();

        $reviews = $productDetail->reviews();
        return view('product.detail.index',
            array(
                'title' => $productDetail->title,
                'meta_keyword' => $productDetail->meta_keywords,
                'meta_description' => $productDetail->meta_description,
                'meta_url' => $request->url(),
                'productDetail' => $productDetail,
                'total_price' => $total_price,
                'rating' => $rating,
                'rating_5_width' => $rating_5_width,
                'rating_4_width' => $rating_4_width,
                'rating_3_width' => $rating_3_width,
                'rating_2_width' => $rating_2_width,
                'rating_1_width' => $rating_1_width,
                'reviews' => $reviews->get(),
                'productBuyWith' => $product_buy_with,
                'product_relate' => $product_relate,
            ));
    }

//    public function GetMoreProduct(Request $request, $slug)
//    {
//        if($request->ajax())
//        {
//            $product = Product::where('slug', $slug)->first();
//            $reviews = $product->reviews();
//            return view('product.detail.rate',compact('reviews'))->render();
//        }
//    }

    public function Rating(Request $request)
    {
        $prod_id = $request->input('product_id');
        $prod_rating = OrderDetail::where('product_id', $prod_id)->where('user_id', Auth::user()->getAuthIdentifier())->where('review_status', 0)->first();
        if($prod_rating){
            $status = Order::where('id', $prod_rating->order_id)->first()->status;
            if($status == StatusOrderEnum::DAGIAO){
                $review = new Review();
                $review->product_id = $request->input('product_id');
                $review->user_name = Auth::user()->name;
                $review->review = $request->input('review');
                $review->star = $request->input('rating');

                $review->save();

                $prod_rating->review_status = 1;
                $prod_rating->update();
                return redirect()->back()->with('status', 'Đánh giá thành công');
            }
        }
        return redirect()->back()->with('status', 'Bạn chưa đặt hàng hoặc chưa nhận sản phẩm');
    }
}
