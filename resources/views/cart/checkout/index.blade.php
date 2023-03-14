@extends('layout.master')
@section('content')
    <div class="container mt-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb fs-6">
                <a class="breadcrumb-item text-dark" href="/">Trang chủ</a>
                <a class="breadcrumb-item text-dark" href="/Cart" aria-current="page">Giỏ hàng</a>
                <a class="breadcrumb-item text-dark active" href="/Cart/CheckOut" aria-current="page">Check Out</a>
            </ol>
        </nav>
        <form action="{{ route('CheckOut') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    @include('cart.checkout.item')
                </div>
                <div class="col-md-4">
                    @include('cart.checkout.typepayment')
                    @include('cart.checkout.address')
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" required id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Tôi xác nhận thông tin của tôi là chính xác
                        </label>
                    </div>
                    <button class="btn btn-success w-100 mb-4">Đặt hàng</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('.city').on('change', function () {
                var matp = $(this).val()
                var _token = $('input[name="_token"]').val()
                var total_price = $('#total_pay').val()
                $.ajax({
                    url: '{{ route('getProvince') }}',
                    method: 'POST',
                    data:{ matp, _token },
                    success: function (data){
                        $('.province').html(data);
                    }
                })

                $.ajax({
                    url: '{{ route('getShippingPrice') }}',
                    method: 'POST',
                    data: { matp, _token },
                    success: function (data){
                        $('.shipping_price').html(data);
                        var number = data.match(/\d/g);
                        number = number.join("");
                        $('#shipping_price').val(number);
                        $('.total_price').html((Number(total_price) + Number(number)).toLocaleString('vn')+'đ');
                    }
                })
            });
        });
    </script>


@endsection
