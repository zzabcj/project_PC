@extends('admin.layout.master')
@section('content')
    <table class="table bg-white mt-5">
        <a class="btn btn-primary" href="{{ route('admin.AddBanner') }}">Thêm</a>
        <thead>
        <tr>
            <th>ID</th>
            <th>Loại</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($banners as $banner)
            <tr>
                <td>{{ $banner->id }}</td>
                <td>{{ $banner->type == 1 ? 'Banner' : 'Sự kiện' }}</td>
                <td><img src="{{ asset('uploads/banner/'.$banner->image) }}" alt="" width="384" height="100"></td>
                <td>
                    @if($banner->active == 1)
                        <span class="badge badge-sm bg-gradient-success"> Hiển thị</span>
                    @else
                        <span class="badge badge-sm bg-gradient-secondary">Không</span>
                    @endif
                </td>
                <td>
                    <a href="{{ url('QuanTri/EditBanner/'.$banner->id) }}">
                        <i class="fa-solid fa-pen-to-square fs-5 me-3 text-primary"></i>
                    </a>
                    <a href="" class="delete" data-id="{{ $banner->id }}" data-type="DeleteBanner">
                        <i class="fa-regular fa-trash-can fs-5 text-danger"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
