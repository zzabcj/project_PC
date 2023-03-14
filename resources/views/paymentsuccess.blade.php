@extends('layout.master')
@section('content')
    <div class="text-center">
        <img src="{{ asset('uploads/success.gif') }}" alt="success" class="img-fluid" style="width: 30%"><br>
        <span class="fs-1 fw-bold text-success">Thanh toán thành công</span>
    </div>
    <div class="text-center">
        <p class="fs-3">Cảm ơn bạn đã tin tưởng và đặt hàng tại cửa hàng chúng tôi</p>
        <p class="fs-5">Đối với trường hợp bạn thanh toán khi nhận hàng, chúng tôi sẽ liên hệ để xác nhận đơn hàng, khi nhận hàng hãy thanh toán cho shipper</p>
        <p class="fs-5">Đối với trường hợp bạn thanh toán bằng chuyển khoản, hãy liên hệ với Fanpage / Zalo chúng tôi để được hướng dẫn cụ thể</p>
    </div>
    <div class="d-flex align-items-center justify-content-center flex-wrap mb-5 mt-3">
        <a href="{{ route('home') }}" class="btn btn-primary me-5 fs-4">Trở về trang chủ</a>
        <a href="{{ route('orders') }}" class="btn btn-success ms-5 fs-4">Xem đơn hàng hàng</a>
    </div>
@endsection
