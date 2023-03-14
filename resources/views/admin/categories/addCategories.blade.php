@extends('admin.layout.master')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            <h6>{{ session('status') }}</h6>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.processAddCategories') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="type_cate">Chọn loại</label>
                    <select class="form-control" id="type_cate" name="type_cate">
                        <option value="0">Thiết bị</option>
                        <option value="1">Hãng</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="name_cate" placeholder="Tên danh mục..." name="name_cate">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Hình thumbnail (600 x 600)</label>
            <input class="form-control" type="file" id="formFile" name="image_cate">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="show_cate" id="show" value="1">
            <label class="custom-control-label" for="show">Hiển thị</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="show_cate" id="notshow" value="0">
            <label class="custom-control-label" for="notshow">không hiển thị</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Thêm</button>
    </form>
@endsection
