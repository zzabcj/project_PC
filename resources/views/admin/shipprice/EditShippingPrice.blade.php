@extends('admin.layout.master')
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            <h6>{{ session('status') }}</h6>
        </div>
    @endif
    <form method="POST" action="{{ url('QuanTri/ProcessEditShippingPrice/'.$shipprice->id) }}">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="matp">Chọn tỉnh/thành phố</label>
                    <select class="form-control" id="matp" disabled>
                        @foreach($city as $ct)
                            <option value="{{ $ct->matp }}" {{ $shipprice->country_id == $ct->matp ? 'selected' : ''}}>{{ $ct->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="price">Nhập phí vận chuyển</label>
                    <input type="text" class="form-control" id="price" placeholder="Phí vận chuyển..." name="price" value="{{ $shipprice->price }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Sửa</button>
    </form>
@endsection
