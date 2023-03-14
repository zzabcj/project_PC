@extends('admin.layout.master')
@section('content')
    <table class="table bg-white mt-5">
        <a class="btn btn-primary" href="{{ route('admin.products') }}">Quay về</a>
        <thead>
        <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên SP</th>
            <th>Giá</th>
            <th>Tồn kho</th>
            <th>Đã bán</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{ $product->image }}" alt="" width="72" height="72" style="object-fit: cover"></td>
                <td>{{ $product->title }}</td>
                <td>
                    {{ number_format($product->price - ($product->price * $product->discount / 100)) }}₫<br>
                    @if($product->discount > 0)
                        <small><del>{{ number_format($product->price) }}₫</del></small><span class="px-2">(-{{ $product->discount }}%)</span>
                    @endif
                </td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->total_sell }}</td>
                <td>
                    <a href="" class="restore" data-id="{{ $product->id }}">
                        <i class="fa-solid fa-window-restore fs-5 me-3 text-success"></i>
                    </a>
                    <a href="" data-id="{{ $product->id }}" class="delete-forever">
                        <i class="fa-regular fa-trash-can fs-5 text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
