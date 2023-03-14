<div class="container my-5">
    @foreach($homeProducts as $homeProduct)
    <div class="d-flex justify-content-between align-items-center flex-wrap mt-3">
        <h3>{{ $homeProduct->title }}</h3>
        <a href="/Product" class="text-dark">Xem tất cả >>> </a>
    </div>
    <hr class="border border-danger border-3 opacity-75">
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <img src="{{ asset('/uploads/categories/'.$homeProduct->thumbnail) }}" loading="crazy" class="my-md-0 my-5 img-fluid" width="600" height="670" style="object-fit: cover">
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="row">
                @foreach($homeProduct->products as $product)
                    <a href="/Product/Detail/{{ $product->slug }}" class="col-lg-4 col-6 my-1 border text-dark">
                        <div class="card border-0">
                            <img src="{{ asset('uploads/products/'.$product->image) }}" class="img-fluid card-img-top w-100" style="height: 200px; object-fit: cover;"/>
                            <div class="info-wrap">
                                <p class="title m-0">{{ $product->title }}</p>
                                <div class="prod-rating d-flex justify-content-start">
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
                                        ( {{ $product->reviews->count() }} )
                                    </ul>
                                </div>
                            </div>
                            <div class="bottom-wrap pb-3">
                                <i class="fa-sharp fa-solid fa-cart-plus btn btn-light btn-icon float-end p-2 btn-addToCart" data-id="{{ $product->id }}"></i>
                                <div class="price-wrap lh-sm">
                                    <strong class="price">{{ number_format($product->price) }}đ</strong> <br />
                                    <small class="text-danger">Còn lại {{ $product->stock }} sản phẩm </small>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>
