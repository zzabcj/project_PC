<div class="bg-gray">
    <div class="container my-5 py-5">
        <div class="row">
            <div class="deal-header d-flex justify-content-between align-items-center flex-wrap">
                <h3>Sản phẩm bán chạy</h3>
                <a href="/Product" class="text-dark">Xem tất cả >>></a>
            </div>
            <hr class="border border-danger border-3 opacity-75">
            @foreach($hotProducts as $product)
                <div class="col-6 col-md-4 col-lg-2 my-3 border-gradient">
                        <a href="/Product/Detail/{{ $product->slug }}" class="deal-body text-dark">
                            <div class="card text-center overflow-hidden">
                                <img src="{{ asset('uploads/products/'.$product->image) }}" class="img-card-top w-100" style="height: 190px; object-fit: cover">
                                <div class="p-2 name-product">{{ $product->title }}</div>
                                <p class="card-text mb-0"><del>Giá: {{ number_format($product->price) }}đ</del></p>
                                <p class="card-text mb-0">Chỉ còn: {{ number_format($product->price * (1 - $product->discount/100)) }}đ</p>
                                <div class="prod-rating d-flex justify-content-center ps-3">
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
                        </a>
                </div>
            @endforeach
            </div>
    </div>
</div>
