@extends('layout.master')
@section('content')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card" style="min-height: 0">
                        <div class="auth-box">
                            <h2>Đăng Ký Người Dùng</h2>
                            <p class="text-white-50 mb-5 text-center">Vui lòng nhập đầy đủ thông tin!</p>
                            @if(Session::has('fail'))
                                <span class="invalid-feedback d-block alert alert-danger"
                                      style="margin-top: -20px; margin-bottom: 20px">
                                    {{ Session::get('fail') }}</span>
                            @endif
                            <form action="{{ route('registerUser') }}" method="post">
                                @csrf
                                <div class="user-box">
                                    <input type="text" name="name" required="" id="name">
                                    <label >Tên người dùng</label>
                                    <span class="invalid-feedback d-block"
                                          style="margin-top: -20px; margin-bottom: 20px">@error('name') {{ $message }} @enderror</span>
                                </div>
                                <div class="user-box">
                                    <input type="email" name="email" required="" id="email">
                                    <label>Email</label>
                                    <span class="invalid-feedback d-block"
                                          style="margin-top: -20px; margin-bottom: 20px">@error('email') {{ $message }} @enderror</span>
                                </div>
                                <div class="user-box">
                                    <input type="password" name="password" required="" id="password">
                                    <label>Mật khẩu</label>
                                    <span class="invalid-feedback d-block"
                                          style="margin-top: -20px; margin-bottom: 20px">@error('password') {{ $message }} @enderror</span>
                                </div>
                                <div class="user-box">
                                    <input type="password" name="password_confirmation" required="" id="password_confirmation">
                                    <label >Nhập lại mật khẩu</label>
                                    <span class="invalid-feedback d-block"
                                          style="margin-top: -20px; margin-bottom: 20px">@error('password_confirmation') {{ $message }} @enderror</span>
                                </div>
                                <div class="form-check text-white">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="terms"
                                        required>
                                    <label class="form-check-label" for="terms">
                                        Tôi đồng ý với <a href="">Điều Khoản</a> & <a href="">Điều Kiện</a> của shop
                                    </label>
{{--                                    <span class="invalid-feedback d-block mt-3">Vui lòng đọc và đồng ý với điều khoản và điều kiện</span>--}}
                                </div>
                                <div class="btn-submit">
                                    <button
                                        type="submit"
                                        class="btn-neon me-0 me-lg-5 d-flex d-lg-inline-block full-width justify-content-center align-items-center text-center">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        Đăng Ký
                                    </button>
                                    <a href="/Auth/Login">
                                        <button type="button" class="btn-neon btn-red ms-0 ms-lg-5 d-flex d-lg-inline-block full-width justify-content-center align-items-center text-center">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            Đăng Nhập
                                        </button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
