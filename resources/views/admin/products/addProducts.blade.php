@extends('admin.layout.master')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            <h6>{{ session('status') }}</h6>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.processAddProducts') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name_prod">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="name_prod" placeholder="Tên sản phẩm..." name="name_prod">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="price_prod">Giá</label>
                    <input type="number" class="form-control" id="price_prod" placeholder="Giá sản phẩm..." name="price_prod">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="discount_prod">% giảm</label>
                    <input type="number" class="form-control" id="discount_prod" placeholder="Số % giảm giá (không cần nhập %)..." name="discount_prod">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="stock_prod">Tồn kho</label>
                    <input type="number" class="form-control" id="stock_prod" placeholder="Số lượng sản phẩm còn lại..." name="stock_prod">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="guarantee_prod">Thời gian bảo hành</label>
                    <input type="number" class="form-control" id="guarantee_prod" placeholder="Thời hạn bảo hành (tháng)..." name="guarantee_prod">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="type_prod">Loại sản phẩm</label>
            <select class="form-control" id="type_prod" name="type_prod">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="brand_prod">Hãng</label>
            <select class="form-control" id="brand_prod" name="brand_prod">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                @endforeach
            </select>
        </div>

        <label for="content">Thông số sản phẩm</label>
        <textarea class="form-control" id="content" name="content"></textarea>

        <label for="benefit">Lợi ích</label>
        <textarea class="form-control" id="benefit" name="benefit"></textarea>

        <label for="description_prod">Mô tả sản phẩm</label>
        <textarea class="form-control" id="description_prod" name="description_prod"></textarea>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="meta_keywords">Keywords ( các keywords cách nhau bằng dấu ',' )</label>
                    <input type="text" class="form-control" id="meta_keywords" placeholder="Keyword tìm kiếm SEO google..." name="meta_keywords">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="meta_description">Description</label>
                    <textarea type="text" class="form-control" id="meta_description" placeholder="Description hiển thị trên google..." name="meta_description" rows="3"></textarea>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="image_prod" class="form-label">Hình sản phẩm</label>
            <input class="form-control" type="file" id="image_prod" name="image_prod">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Thêm</button>
    </form>
@endsection
