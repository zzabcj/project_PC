@extends('admin.layout.master')
@section('content')
    <table class="table bg-white mt-5">
        <a class="btn btn-primary" href="{{ route('admin.AddShippingPrice') }}">Thêm</a>
        <thead>
        <tr>
            <th>ID</th>
            <th>Tỉnh</th>
            <th>Phí vận chuyển</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($shipping_price as $price)
            <tr>
                <td>{{ $price->id }}</td>
                <td>{{ $price->name }}</td>
                <td>{{ number_format($price->price) }}đ</td>
                <td>
                    <a href="{{ url('QuanTri/EditShippingPrice/'.$price->id) }}">
                        <i class="fa-solid fa-pen-to-square fs-5 me-3 text-primary"></i>
                    </a>
                    <a href="" class="delete" data-id="{{ $price->id }}" data-type="DeleteShippingPrice">
                        <i class="fa-regular fa-trash-can fs-5 text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
