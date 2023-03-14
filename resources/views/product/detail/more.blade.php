<h4 class="card-header text-bg-light">
    Mua kèm
</h4>
<hr>
<div class="row">
    @foreach($productBuyWith as $product)
        <a href="/Product/Detail/{{ $product->slug }}">
            <div class="border col-8 mx-auto col-md-4 col-xl-12">
                <div class="card text-bg-light border-0">
                    <div class="card-body">
                        <img src="{{ asset('uploads/products/'.$product->image) }}" alt="" class="img-fluid" style="width: 272px; height: 272px; object-fit: cover">
                        <span>{{ $product->title }}</span><br><br>
                        <div class="d-flex align-items-center flex-wrap">
                            @if($product->discount)
                                <del>{{ number_format($product->price) }}đ</del>
                                <span class="fs-6 text-danger ps-2 ps-xl-3">{{ number_format($product->price * (100-$product->discount)/100) }}đ</span>
                            @else
                                <span class="fs-6 text-danger ps-2 ps-xl-3">{{ number_format($product->price) }}đ</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
