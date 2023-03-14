@extends('user.index')
@section('userContent')
    <div class="text-bg-light p-5">
        <h2>Đổi mật khẩu</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('ProcessChangePassword') }}" method="post">
            @csrf
            <div class="from-group mt-4">
                <div class="mb-3 row">
                    <label for="old_password" class="col-3 form-label">Mật khẩu cũ</label>
                    <div class="col-9">
                        <input type="password" class="form-control" id="old_password" autocomplete="none" placeholder="Nhập mật khẩu cũ..." name="old_password">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="new_password" class="col-3 form-label">Mật khẩu mới</label>
                    <div class="col-9">
                        <input type="password" class="form-control" id="new_password" autocomplete="none" placeholder="Nhập mật khẩu mới..." name="new_password">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="renew_password" class="col-3 form-label">Nhập lại mật khẩu mới</label>
                    <div class="col-9">
                        <input type="password" class="form-control" id="renew_password" autocomplete="none" placeholder="Nhập lại mật khẩu mới..." name="new_passwordconfirm">
                    </div>
                </div>
                <div class="mb-3 row">
                    <button class="btn btn-primary mt-3" type="submit">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection
