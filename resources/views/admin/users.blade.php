@extends('admin.layout.master')
@section('content')
    <table class="table bg-white mt-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Số đơn hàng đã đặt</th>
            <th>Số tiền đã chi trả</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->orders->count() }}</td>
                <td>{{ number_format($user->orders->sum('total_pay'))  }}đ</td>
                <td>
                    <a href="">
                        <i class="fa-solid fa-pen-to-square fs-5 me-3 text-primary"></i>
                    </a>
                    <a href="">
                        <i class="fa-regular fa-trash-can fs-5 text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
