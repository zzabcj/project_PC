<div class="container mt-5 mb-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb fs-6">
            <a class="breadcrumb-item text-dark" href="/" >Trang chủ</a>
            <a class="breadcrumb-item text-dark" href="/Product" aria-current="page" >Sản phẩm</a>
            <a class="breadcrumb-item text-dark active" href="/Detail/" aria-current="page" >{{ $productDetail->title }}</a>
        </ol>
    </nav>
    <div class="row">
    <div class="col-md-5">
        <div class="main-img">
            <img src="{{ asset('uploads/products/'.$productDetail->image) }}" class="w-100" style="height: 600px; object-fit: cover">
        </div>
{{--        <div class="thumb-img d-flex justify-content-between align-items-center">--}}
{{--            <div class="row">--}}
{{--                <div class="col-3 py-2">--}}
{{--                    <img src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png" class="img-fluid">--}}
{{--                </div>--}}
{{--                <div class="col-3 py-2">--}}
{{--                    <img src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png" class="img-fluid">--}}
{{--                </div>--}}
{{--                <div class="col-3 py-2">--}}
{{--                    <img src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png" class="img-fluid">--}}
{{--                </div>--}}
{{--                <div class="col-3 py-2">--}}
{{--                    <img src="https://product.hstatic.net/1000333506/product/pc_hotgear_1_i3_10100f_0cc48584a613444a8e12867dbda76f1d.png" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <div class="col-md-7 px-5">
        <h2 class="prod-detail-name">
            {{ $productDetail->title }}
        </h2>
        <div class="prod-detail-rate d-inline-block">
            <span>Đánh Giá: </span>
{{--            @if($user_rate >= 1 && $user_rate <= 5)--}}
{{--                <i class="fa-solid fa-star text-warning"></i>--}}
{{--            @else()--}}
{{--                <i class="fa-solid fa-star text-black-50"></i>--}}
{{--            @elseif($user_rate >= 2 && $user_rate <= 5)--}}
{{--                <i class="fa-solid fa-star text-warning"></i>--}}
{{--                @else()--}}
{{--                    <i class="fa-solid fa-star text-black-50"></i>--}}
{{--                @elseif($user_rate >= 3 && $user_rate <= 5)--}}
{{--            <i class="fa-solid fa-star text-warning"></i>--}}
{{--            <i class="fa-solid fa-star text-warning"></i>--}}
{{--            <i class="fa-solid fa-star text-warning"></i>--}}
{{--            <i class="fa-solid fa-star text-black-50"></i>--}}

{{--            CẦN TỐI ƯU --}}
            @switch(floor($rating))
                @case(1)
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-black-50"></i>
                    <i class="fa-solid fa-star text-black-50"></i>
                    <i class="fa-solid fa-star text-black-50"></i>
                    <i class="fa-solid fa-star text-black-50"></i>
                    @break
                @case(2)
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-black-50"></i>
                    <i class="fa-solid fa-star text-black-50"></i>
                    <i class="fa-solid fa-star text-black-50"></i>
                    @break
                @case(3)
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-black-50"></i>
                    <i class="fa-solid fa-star text-black-50"></i>
                    @break
                @case(4)
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-black-50"></i>
                    @break
                @case(5)
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    <i class="fa-solid fa-star text-warning"></i>
                    @break
            @endswitch
            ({{ $rating }})
            <span class="border-2 border-dark-50 border-start px-2">{{ $productDetail->reviews->count() }} lượt đánh giá </span>
            <span class="border-2 border-dark-50 border-start px-2">Đã bán: {{ number_format($productDetail->total_sell) }} sản phẩm</span>
        </div>
        <div class="prod-detail-price mt-4">
            <h3 class="text-danger">{{ number_format($total_price) }}₫</h3>
            @if($productDetail->discount > 0)
                <small><del>{{ number_format($productDetail->price) }}₫</del></small><span class="px-2">(-{{ $productDetail->discount }}%)</span>
            @endif
        </div>
        <div class="prod-detail-content mt-4">
            <h4>Thông số sản phẩm</h4>
            {!! $productDetail->content !!}
        </div>
        <hr>
        <div class="prod-detail-status">
            <span class="fs-5 fw-semibold">Tình Trạng: </span>
            @if($productDetail->stock>5)
                <span class="text-primary" >Còn hàng</span><br>
            @elseif($productDetail->stock > 0 && $productDetail->stock <= 5)
                <span class="text-warning">Sắp hết hàng</span>
            @else
                <span class="text-danger">Hết hàng</span><br>
            @endif
        </div>
        <div class="prod-detail-quaranty">
            <h4 class="mt-3">Bảo Hành: <span class="text-danger"> {{ $productDetail->guarantee }} Tháng</span></h4>
        </div>
        <div class="prod-detail-benefit">
            <div class="my-3 border border-1 border-radius-3 rounded">
{{--                <span class="badge text-bg-danger">HOT</span>--}}
                <div class="card" style="min-height: 0">
                    <div class="card-header bg-danger text-white">Ưu đãi kèm theo</div>
                    <div class="card-content ms-3 mt-3">
                        <span class=""> {!! $productDetail->benefit !!}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="prod-detail-buy row mt-5">
            <a href="/BuyNow/{{ $productDetail->id }}" class="btn-buy""><span class="btn-text">Mua ngay</span></a>
            <a href="" class="btn-buy btn-addToCart" data-id="{{ $productDetail->id }}"><span class="btn-text btn-add-text">Thêm vào giỏ hàng</span></a>
        </div>
    </div>
</div>
</div>
