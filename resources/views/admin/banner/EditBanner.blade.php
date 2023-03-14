@extends('admin.layout.master')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            <h6>{{ session('status') }}</h6>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.processEditBanner',$banner->id) }}">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="type">Chọn loại</label>
                    <select class="form-control" id="type" name="type" disabled>
                        <option value="1" {{ $banner->type == 1 ? 'selected' : '' }}>Banner</option>
                        <option value="2" {{ $banner->type == 2 ? 'selected' : '' }}>Sự kiện</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh Banner(1920x500), Sự kiện(1920x1080)</label>
            <input class="form-control mb-3" type="file" id="image" name="image">
            <img src="{{ asset('uploads/banner/'.$banner->image) }}" alt="" width="1440" height="375">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="active" id="show" value="1" {{ $banner->active == 1 ? 'checked' : '' }}>
            <label class="custom-control-label" for="show">Hiển thị</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="active" id="notshow" value="0" {{ $banner->active == 0 ? 'checked' : '' }}>
            <label class="custom-control-label" for="notshow">không hiển thị</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Sửa</button>
    </form>
@endsection
