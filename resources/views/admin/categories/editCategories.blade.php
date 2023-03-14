@extends('admin.layout.master')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            <h6>{{ session('status') }}</h6>
        </div>
    @endif
    <form method="POST" action="{{ url('QuanTri/ProcessEditCategories/'.$category->id) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="type_cate">Chọn loại</label>
                    <select class="form-control" id="type_cate" name="type_cate">
                        <option value="0" {{ $category->type == 0 ? 'selected' : '' }}>Thiết bị</option>
                        <option value="1" {{ $category->type == 1 ? 'selected' : '' }}>Hãng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="name_cate" placeholder="Tên danh mục..." name="name_cate" value="{{ $category->title }}">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Hình thumbnail</label>
            <input class="form-control" type="file" id="formFile" name="image_cate">
            <img src="{{ asset('/uploads/categories/'.$category->thumbnail) }}" alt="" width="150" height="150" class="mt-3">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="show_cate" id="show" value="1" {{ $category->active == 1 ? 'checked' : '' }}>
            <label class="custom-control-label" for="show">Hiển thị</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="show_cate" id="notshow" value="0" {{ $category->active == 0 ? 'checked' : '' }}>
            <label class="custom-control-label" for="notshow">không hiển thị</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Cập Nhật</button>
    </form>
@endsection
