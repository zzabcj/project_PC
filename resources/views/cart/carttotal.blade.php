<div class="card text-bg-light">
    <div class="p-4">
        <h4>Tổng thanh toán</h4>
        <hr>
            @php
                $total = 0;
                $count = 0;
            @endphp
        @foreach($carts as $cart)
           @php
                $count++;
                $total += $cart->price * (1 - $cart->discount/100) * $cart->quantity;
           @endphp

        @endforeach
        <div class="row">
            <div class="col-6">
                <p>{{ $count }} sản phẩm</p>
                <p>Phí vận chuyển</p>
                <p>Tổng thanh toán</p>
            </div>
            <div class="col-6">
                <p>{{ number_format($total) }}đ</p>
                <p>100.000đ</p>
                <p>{{ number_format($total+100000) }}đ</p>
            </div>
        </div>
        <hr>
        <h6>Mã giảm giá</h6>
        <div class="row mt-3">
            <div class="col-auto">
                <label class="visually-hidden">Mã Giảm giá</label>
                <input type="text" class="form-control" placeholder="Nhập mã giảm giá..." autocomplete="off">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Áp dụng</button>
            </div>
        </div>
        <hr>
        <a href="/Cart/CheckOut" class="btn btn-success w-100">Mua hàng</a>
    </div>
</div>
