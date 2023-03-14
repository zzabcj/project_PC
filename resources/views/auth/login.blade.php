@extends('layout.master')
@section('content')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="card" style="min-height: 0">
                        <div class="auth-box">
                            <h2>Đăng Nhập Hệ Thống</h2>
                            <p class="text-white-50 mb-5 text-center">Vui lòng nhập tài khoản và mật khẩu!</p>
                            @if(Session::has('fail'))
                                <span class="invalid-feedback d-block alert alert-danger"
                                      style="margin-top: -20px; margin-bottom: 20px">
                                    {{ Session::get('fail') }}</span>
                            @endif
                            @if(Session::has('success'))
                                <span class="invalid-feedback d-block alert alert-success"
                                      style="margin-top: -20px; margin-bottom: 20px">
                                    {{ Session::get('success') }}</span>
                            @endif
                            <form action="{{ route('loginUser') }}" method="post">
                                @csrf
                                <div class="user-box">
                                    <input type="text" name="email" required="" id="email" value="{{ old('email') }}">
                                    <label>Email</label>
                                    <span class="invalid-feedback d-block"
                                          style="margin-top: -20px; margin-bottom: 20px">@error('email') {{ $message }} @enderror</span>
                                </div>
                                <div class="user-box">
                                    <input type="password" name="password" id="password" required="">
                                    <label>Mật khẩu</label>
                                    <span class="invalid-feedback d-block"
                                          style="margin-top: -20px; margin-bottom: 20px">@error('password') {{ $message }} @enderror</span>
                                </div>
                                <p class="small"><a href="/" class="text-white-50">Quên Mật Khẩu?</a></p>
                                <div class="btn-submit">
                                    <button type="submit"
                                            class="btn-neon me-0 me-lg-5 d-flex d-lg-inline-block full-width justify-content-center align-items-center text-center">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        Đăng Nhập
                                    </button>
                                    <a href="/Auth/Register" >
                                        <button type="button" class="btn-neon btn-red ms-0 ms-lg-5 d-flex d-lg-inline-block full-width justify-content-center align-items-center text-center">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            Đăng Ký

                                        </button>
                                    </a>
                                </div>
                                <hr class="border border-primary border-2 opacity-50">
                                <p class="text-white-50 text-center mt-3" style="margin-bottom: -8px">Hoặc đăng nhập bằng</p>
                                <div class="d-flex justify-content-center text-center">
                                    <a href="#!" class="text-white btn-neon"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white btn-neon"><i class="fab fa-twitter fa-lg"></i></a>
                                    <a href="#!" class="text-white btn-neon"><i class="fab fa-google fa-lg"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
