<div class="container mt-5">
    <div class="deal-header d-flex justify-content-between align-items-center flex-wrap">
        <h2>Sản phẩm liên quan</h2>
        <a href="/Product" class="text-dark">Xem tất cả >>></a>
    </div>
    <hr>
    <div class="row">
        @foreach($product_relate as $product)
            <div class="col-6 col-md-4 col-lg-2 my-2">
            <div class="border rounded">
                <div class="card border-0">
                    <a href="/Product/Detail/{{ $product->slug }}">
                        <img src="{{ asset('uploads/products/'.$product->image) }}" class="img-card-top w-100" height="200" style="object-fit: cover">
                    </a>
                    <div class="card-body">
                        <a href="/Product/Detail/{{ $product->slug }}" class="text-dark">{{ $product->title }}</a>
                        <br>
                        <span class="prod-rating">
                            @switch(floor($product->reviews->count() > 0 ?  round($product->reviews->sum('star')/$product->reviews->count(), 1) : 0))
                                @case(0)
                                    <span class="text-warning">Chưa có đánh giá</span>
                                    @break
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
                        </span>
                        <span class="px-2 text-warning">{{ $product->reviews->count() > 0 ?  round($product->reviews->sum('star')/$product->reviews->count(), 1) : 0 }} </span>

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
                            </span><br>
                        @endif
                        <p class="card-text mb-0">{{ number_format(($product->price) - ($product->price * $product->discount / 100)) }}đ</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
