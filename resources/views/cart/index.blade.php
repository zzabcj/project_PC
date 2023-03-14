@extends('layout.master')
@section('content')
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
    <div class="container mt-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb fs-6">
                <a class="breadcrumb-item text-dark" href="/">Trang chủ
                </a>
                <a class="breadcrumb-item text-dark active" href="/Cart" aria-current="page">Giỏ hàng
                </a>
            </ol>
        </nav>
        <h1>Giỏ Hàng</h1>
        <div class="row">
            <div class="col-md-12">
                {{--                cart item--}}
                @include('cart.cartitem')
            </div>
            <div class="col-md-12">
                <p class="fs-5 fw-bold text-end me-5 total_product">Tổng {{ $count }} sản phẩm: {{ number_format($total) }}đ</p>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-10"></div>
            <div class="col-md-2"><a href="/Cart/CheckOut" class="btn btn-primary w-100 {{ $count ? '' : 'disabled' }}">Thanh toán</a></div>
        </div>
    </div>
@endsection
