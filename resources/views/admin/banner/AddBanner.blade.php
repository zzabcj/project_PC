@extends('admin.layout.master')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            <h6>{{ session('status') }}</h6>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.processAddBanner') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="type">Chọn loại</label>
                    <select class="form-control" id="type" name="type">
                        <option value="1">Banner</option>
                        <option value="2">Sự kiện</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="image_banner" class="form-label">Hình ảnh Banner(1920x500), Sự kiện(1920x1080)</label>
            <input class="form-control" type="file" id="image_banner" name="image_banner">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="active" id="show" value="1">
            <label class="custom-control-label" for="show">Hiển thị</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="active" id="notshow" value="0">
            <label class="custom-control-label" for="notshow">không hiển thị</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Thêm</button>
    </form>
@endsection
