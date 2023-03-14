<div class="d-flex flex-wrap justify-content-between">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <a class="breadcrumb-item text-dark" href="/" >Trang chủ</a>
            <a class="breadcrumb-item text-dark active" href="/Product" aria-current="page" >Sản phẩm</a>
        </ol>
    </nav>
        <select class="form-select sort_product" style="width: 150px" name="sort">
            <option value="" selected>Sắp xếp</option>
            <option value="price_inc" {{ request()->sort == 'price_inc' ? 'selected' : '' }}>Giá: Tăng dần</option>
            <option value="price_dec" {{ request()->sort == 'price_dec' ? 'selected' : '' }}>Giá: Giảm dần</option>
            <option value="on_stock" {{ request()->sort == 'on_stock' ? 'selected' : '' }}>Còn hàng</option>
            <option value="atoz" {{ request()->sort == 'atoz' ? 'selected' : '' }}>Tên A->Z</option>
        </select>
</div>
<div class="product-item">
    <div class="row">
        <!-- foreach -->
        @if($products->total())
            @foreach($products as $product)
            <div class="col-12 col-md-4 p-3">
            <div class="card text-dark border-0">
                <div class="border border-2 rounded">
                    <a href="/Product/Detail/{{ $product->slug }}">
                        <img class="card-img-top w-100" src="{{ asset('uploads/products/'.$product->image) }}" style="height: 330px; object-fit: cover">
                    </a>
                    <a href="/Product/Detail/{{ $product->slug }}" class="text-dark">
                        <div class="card-body">{{ $product->title }}</div>
                    </a>
                    <p class="text-muted px-3 my-0">{{ number_format($product->total_sell) }} đã bán</p>
                    <div class="prod-rating d-flex justify-content-start ps-3">
                        @if($product->reviews->count() == 0)
                            <span class="label-rating text-warning pb-3">Chưa có đánh giá</span>
                        @endif
                        <ul class="rating p-0">
                            @switch(floor($product->reviews->count() > 0 ?  round($product->reviews->sum('star')/$product->reviews->count(), 1) : 0))
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
                        </ul>
                        <span class="px-2 text-warning">{{ $product->reviews->count() > 0 ?  round($product->reviews->sum('star')/$product->reviews->count(), 1) : 0 }}</span>
                    </div>
                    <div class="card-text px-3 pb-3 d-flex justify-content-between align-items-center">
                        <div class="prod-price">
                            @if($product->discount > 0)
                                <span>
                                <small>
                                    <del>
                                        {{ number_format($product->price) }}đ
                                    </del>
                                </small>
                                <span class="px-2">
                                    -{{ $product->discount }}%
                                </span>
                            </span>
                            @endif
                            <br>
                            <span class="text-danger">{{ number_format(($product->price) - ($product->price * $product->discount / 100) ) }}đ</span>
                        </div>
                        <div class="prod-action fs-3">
                            <a href="" class="btn-addToCart" data-id="{{ $product->id }}"><i class="fa-solid fa-cart-plus px-2 text-dark"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <p class="ms-3 fs-4">Không tìm thấy sản phẩm</p>
        @endif
        <!-- endforeach -->
    </div>
</div>
<div class="product-pagination text-center my-3">
    <a href="{{ $products->url(1) }}" class="kbc-button kbc-button-lg m-3">Home</a>
    <a href="{{ $products->url($products->currentPage()-1) }}" class="kbc-button kbc-button-lg m-3 {{ $products->onFirstPage() ? 'disabled' : '' }}">←</a>

    @if($products->currentPage()>2)
        <a href="{{ $products->url($products->currentPage()-2) }}" class="kbc-button kbc-button-lg m-3">{{ $products->currentPage()-2 }}</a>
    @endif

    @if($products->currentPage()>1)
        <a href="{{ $products->url($products->currentPage()-1) }}" class="kbc-button kbc-button-lg m-3">{{ $products->currentPage()-1 }}</a>
    @endif

    <a href="{{ $products->url($products->currentPage()) }}" class="kbc-button kbc-button-lg m-3 active">{{ $products->currentPage() }}</a>
    @if($products->currentPage() <= $products->lastPage()-1)
        <a href="{{ $products->url($products->currentPage()+1) }}" class="kbc-button kbc-button-lg m-3">{{ $products->currentPage()+1 }}</a>
    @endif

    @if($products->currentPage() <= $products->lastPage()-2)
        <a href="{{ $products->url($products->currentPage()+2) }}" class="kbc-button kbc-button-lg m-3">{{ $products->currentPage()+2 }}</a>
    @endif

    <a href="{{ $products->url($products->currentPage()+1) }}" class="kbc-button kbc-button-lg m-3 {{ $products->currentPage() == $products->lastPage() ? 'disabled' : '' }}">→</a>
    <a href="{{ $products->url($products->lastPage()) }}" class="kbc-button kbc-button-lg m-3">End</a>
</div>
