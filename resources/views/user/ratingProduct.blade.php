@extends('layout.master')
@section('content')
    <div class="container">
        <div class="px-5 pb-5">
            <h2>Đánh giá sản phẩm
            @if($orders)
                @foreach($orders->order_detail as $product)
                <form action="">
                    <div class="border mt-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center align-items-center">
                                <img src="{{ $product->product_image }}" alt="" width="72" height="72" style="object-fit: cover">
                                <p class="ms-3">{{ $product->product_name }}</p>
                            </div>
                            <div class="card-body">
                                    <fieldset>
                                        <span class="star-cb-group">
                                          <input type="radio" id="rating-5" name="rating" value="5" checked="checked" /><label for="rating-5">5</label>
                                          <input type="radio" id="rating-4" name="rating" value="4" /><label for="rating-4">4</label>
                                          <input type="radio" id="rating-3" name="rating" value="3" /><label for="rating-3">3</label>
                                          <input type="radio" id="rating-2" name="rating" value="2" /><label for="rating-2">2</label>
                                          <input type="radio" id="rating-1" name="rating" value="1" /><label for="rating-1">1</label>
                                        </span>
                                    </fieldset>
                                <div class="mb-3">
                                    <label for="rate_review" class="form-label">Cảm nhận của bạn</label>
                                    <textarea class="form-control" id="rate_review" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="" class="btn btn-primary">Đánh giá</a>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
            @endif
        </div>
    </div>
@endsection
