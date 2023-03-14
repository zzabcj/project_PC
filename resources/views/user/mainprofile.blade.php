@extends('user.index')
@section('userContent')
    <div class="text-bg-light p-5">
        <h2>Thay đổi thông tin cá nhân</h2>
        <div class="from-group mt-4">
            <div class="mb-3 row">
                <label for="username" class="col-2 form-label">Tên người dùng</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="username" placeholder="Tên của bạn..." value="{{ $user->name }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-2 form-label">Email</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="email" placeholder="Email của bạn..." value="{{ $user->email }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="phone_number" class="col-2 form-label">Số điện thoại</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="phone_number" placeholder="Số điện thoại của bạn..." value="{{ $user->phone_number }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="address" class="col-2 form-label">Địa chỉ</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="address" placeholder="Địa chỉ của bạn...." value="{{ $user->address }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="zipcode" class="col-2 form-label">Mã bưu điện</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="zipcode" placeholder="Mã zipcode của bạn..." value="{{ $user->postal_code }}">
                </div>
                <a href="https://imta.edu.vn/ma-buu-dien-zip-code-viet-nam/" target="_blank" class="text-primary mt-3">Tra mã bưu điện của bạn tại đây</a>
            </div>
            <div class="mb-3 row">
                <label class="col-2"></label>
                <button class="btn btn-primary mt-3">Cập nhật</button>
            </div>
        </div>
    </div>
@endsection
