<div class="card border-0 text-bg-light px-5 py-3 mb-5">
    <h2>Check Out</h2>
    @php
        $total = 0;
    @endphp
    @foreach($carts as $cart)
        <div class="row border p-2 my-3">
            <div class="col-3 col-xl-2">
                <img src="{{ asset('uploads/products/'.$cart->image) }}" alt="" class="cart-prod-img" width="72" height="72">
            </div>
            <div class="col-10">
                <span>{{ $cart->title }}</span><br>
                <span class="fw-semibold">Số lượng : {{ $cart->quantity }}</span><br>
                <span class="fw-semibold">Thành tiền : {{ number_format($cart->price * (1 - $cart->discount/100) * $cart->quantity) }}đ</span>
            </div>
        </div>

        @php
            $total += $cart->price * (1 - $cart->discount/100) * $cart->quantity;
        @endphp
    @endforeach

    <div class="fw-bold fs-5">
        <Span class="mwidth">Tổng cộng : </Span><span class="total_pay">{{ number_format($total) }}</span>đ<br>
        <input type="hidden" value="{{ ceil($total) }}" id="total_pay" name="total_pay">
        <span class="mwidth">Phí vận chuyển: </span><span class="shipping_price">30.000đ</span>
        <input type="hidden" value="30000" id="shipping_price" name="shipping_price">
        <hr>
        <span class="mwidth">Tổng thanh toán: </span><span class="total_price">{{ number_format($total + 30000) }}đ</span>
    </div>
</div>
