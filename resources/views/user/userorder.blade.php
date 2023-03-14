@php use App\Enums\StatusOrderEnum; @endphp
@extends('user.index')
@section('userContent')
    <div class="px-5 pb-5">
        <h2>Đơn hàng của tôi</h2>
        @if($orders)
            @foreach($orders as $order)
            <div class="border mt-4 user-order">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center py-3">
                        <div class="order-header">
                            <span>ID Đơn hàng : {{ $order->id }} <i class="fa-solid fa-circle"
                                                                    style="font-size:4px;"></i>
                                <span
                                    class="ms-1 fw-bold status-order">{{ StatusOrderEnum::getDescription($order->status) }}</span></span><br>
                            <span
                                class="text-muted">Đặt ngày : {{ date('d-m-Y', strtotime($order->created_at)) }}</span>
                        </div>
                        @if($order->status<3)
                            <a
                                class="text-end btn btn-danger {{ $order->status == 0 ? '' : 'disabled' }} btn-cancel-order"
                                data-id="{{ $order->id }}"
                            >Huỷ đơn</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <span class="text-muted">Thông tin người nhận</span><br>
                                <span>{{ $order->name_receiver }}</span> -
                                <span>{{ $order->phone_receiver }}</span><br>
                                <span>{{ $order->email_receiver }}</span>
                            </div>
                            <div class="col-md-4 border-start">
                                <span class="text-muted">Địa chỉ người nhận</span><br>
                                <span>{{ $order->address_receiver }}</span><br>
                            </div>
                            <div class="col-md-4 border-start">
                                <span class="text-muted">Phương thức thanh toán</span><br>
                                <span>
                                    @switch($order->method_pay)
                                        @case(0)
                                            <span class="text-success">Thanh toán khi nhận hàng</span>
                                            @break
                                        @case(1)
                                            <span class="text-primary">Chuyển khoản</span>
                                            @break
                                    @endswitch
                                </span><br>
                                <span>Phí vận chuyển: {{ number_format($order->shipping_price) }}đ</span><br>
                                <span>Tổng cộng: {{ number_format($order->total_pay + $order->shipping_price) }}đ</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            @foreach($order->order_detail as $key => $product)
                                <div
                                    class="col-md-6 d-flex justify-content-center align-items-center {{ $key % 2 == 0 ? 'border-end border-1' : '' }}">
                                    <div class="order-prod-img">
                                        <img src="{{ asset('uploads/products/'.$product->product_image) }}" alt="" width="72" height="72">
                                    </div>
                                    <div class="order-prod-info p-3">
                                        <a href="../Product/Detail/{{ $product->product_slug }}"
                                           class="text-dark">{{ $product->product_name }}</a><br>
                                        <span class="fw-bold">{{ $product->quantity }}x = {{ number_format($product->price * $product->quantity) }}đ</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @else
            <p class="fs-4 ms-3">Bạn chưa có đơn hàng nào</p>
        @endif

        <div class="order-pagination text-center mt-3">
            <a href="{{ $orders->url(1) }}" class="kbc-button kbc-button-lg m-3">Home</a>
            <a href="{{ $orders->url($orders->currentPage()-1) }}"
               class="kbc-button kbc-button-lg m-3 {{ $orders->onFirstPage() ? 'disabled' : '' }}">←</a>

            @if($orders->currentPage()>2)
                <a href="{{ $orders->url($orders->currentPage()-2) }}"
                   class="kbc-button kbc-button-lg m-3">{{ $orders->currentPage()-2 }}</a>
            @endif

            @if($orders->currentPage()>1)
                <a href="{{ $orders->url($orders->currentPage()-1) }}"
                   class="kbc-button kbc-button-lg m-3">{{ $orders->currentPage()-1 }}</a>
            @endif

            <a href="{{ $orders->url($orders->currentPage()) }}"
               class="kbc-button kbc-button-lg m-3 active">{{ $orders->currentPage() }}</a>

            @if($orders->currentPage() <= $orders->lastPage()-1)
                <a href="{{ $orders->url($orders->currentPage()+1) }}"
                   class="kbc-button kbc-button-lg m-3">{{ $orders->currentPage()+1 }}</a>
            @endif

            @if($orders->currentPage() <= $orders->lastPage()-2)
                <a href="{{ $orders->url($orders->currentPage()+2) }}"
                   class="kbc-button kbc-button-lg m-3">{{ $orders->currentPage()+2 }}</a>
            @endif

            <a href="{{ $orders->url($orders->currentPage()+1) }}"
               class="kbc-button kbc-button-lg m-3 {{ $orders->currentPage() == $orders->lastPage() ? 'disabled' : '' }}">→</a>
            <a href="{{ $orders->url($orders->lastPage()) }}" class="kbc-button kbc-button-lg m-3">End</a>
        </div>
    </div>
@endsection
