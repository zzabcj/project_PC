@extends('admin.layout.master')
@section('content')
    <table class="table bg-white mt-5">
        <a class="btn btn-primary" href="{{ route('admin.addCategories') }}">Thêm</a>
        <thead>
            <tr>
                <th>ID</th>
                <th>Loại</th>
                <th>Tên</th>
                <th>Ảnh</th>
                <th>Hiển thị</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->type ? 'Hãng' : 'Thiết bị' }}</td>
                    <td>{{ $category->title }}</td>
                    <td><img src="{{ asset('/uploads/categories/'.$category->thumbnail) }}" alt="" width="100" height="100"></td>
                    <td>
                        @if($category->active == 1)
                            <span class="badge badge-sm bg-gradient-success"> Hiển thị</span>
                        @else
                            <span class="badge badge-sm bg-gradient-secondary">Không</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('QuanTri/EditCategories/'.$category->id) }}">
                            <i class="fa-solid fa-pen-to-square fs-5 me-3 text-primary"></i>
                        </a>
                        <a href="#" class="delete" data-id="{{ $category->id }}" data-type="DeleteCategories">
                            <i class="fa-regular fa-trash-can fs-5 text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
