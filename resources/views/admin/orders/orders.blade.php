@php
    use App\Enums\StatusOrderEnum;
@endphp
@extends('admin.layout.master')
@section('content')
    <table class="table bg-white mt-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên người nhận</th>
            <th>Sdt người nhận</th>
            <th>Địa chỉ người nhận</th>
            <th>Tổng thanh toán</th>
            <th>Phương thức thanh toán</th>
            <th></th>
            <th>Trạng thái</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->name_receiver }}</td>
                <td>{{ $order->phone_receiver }}</td>
                <td>{{ $order->address_receiver }}</td>
                <td>{{ number_format($order->total_pay + $order->shipping_price) }}đ</td>
                <td>{{ $order->method_pay ? 'Thanh toán qua thẻ' : 'Thanh toán khi nhận hàng' }}</td>
                <td><a href="" data-id="{{ $order->id }}" class="show-order-product" data-bs-toggle="modal"
                       data-bs-target="#showProduct"><i class="fa-solid fa-eye"></i></a></td>
                <td>
                    <div class="form-group">
                        @csrf
                        <select name="status" class="form-control status" data-id="{{ $order->id }}">
                            @foreach($status as $key => $stt)
                                <option
                                    value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }}>{{ $stt }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @include('admin.orders.modal')

@endsection
