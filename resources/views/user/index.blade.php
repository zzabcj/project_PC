@extends('layout.master')
@section('content')
    <div class="container mt-4">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb fs-6">
                <a href="/" class="breadcrumb-item text-dark" >Trang chủ</a>
                <a href="/User" class="breadcrumb-item text-dark active" aria-current="page">Thông tin cá nhân</a>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-3">
                @include('user.navbar')
            </div>
            <div class="col-md-9">
                @yield('userContent')
            </div>
        </div>
    </div>
@endsection
