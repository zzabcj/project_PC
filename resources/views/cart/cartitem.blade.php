<table class="table table-responsive mb-5">
    <thead>
    <tr>
        <th scope="col">Sản phẩm</th>
        <th scope="col">Đơn giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Thành tiền</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @if($count)
        @foreach($carts as $cart)
            <tr>
                <td class="d-flex me-0">
                    <img src="{{ asset('uploads/products/'.$cart->image) }}" alt="" class="cart-prod-img">
                    <a href="/Product/Detail/{{ $cart->slug }}" class="ps-3 text-dark" style="max-width:350px">{{ $cart->title }}</a>
                </td>
                <td>
                    @if($cart->discount)
                        <del>{{ number_format($cart->price) }}đ</del><br>
                        <span class="prod_price">{{ number_format($cart->price * (1 - $cart->discount/100)) }}đ</span>
                    @else
                        <span class="prod_price">{{ number_format($cart->price) }}đ</span>
                    @endif
                </td>
                <td>
                    <div class="input-group d-inline-flex flex-wrap" style="max-width: 150px;">
                        <a class="btn btn-outline-secondary updateQuantity" href="" data-id="{{ $cart->product_id }}" data-type="Dec" data-stock="{{ $cart->stock }}">-</a>
                        <input type="text" class="form-control text-center quantityProduct" value="{{ $cart->quantity }}" size="1" readonly>
                        <a class="btn btn-outline-secondary updateQuantity {{ $cart->quantity  >=  $cart->stock ? 'disabled' : ''}}" href="" data-id="{{ $cart->product_id }}" data-type="Inc" data-stock="{{ $cart->stock }}">+</a>
                    </div>
                </td>
                <td class="sum_product">{{ number_format(($cart->price * (1 - $cart->discount/100))*$cart->quantity) }}đ</td>
                <td><a href="#" class="text-dark updateQuantity" data-id="{{ $cart->product_id }}" data-type="Del">X</a></td>
            </tr>
        @endforeach
    @else
        <tr><td colspan="5">Bạn chưa có sản phẩm nào trong giỏ hàng</td></tr>
    @endif
    </tbody>
</table>
