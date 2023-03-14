@extends('layout.master')
@section('content')
    <div class="container mt-5">
        <form action="" class="form-sort">
            <div class="row">
                <div class="col-lg-3">
                    @include('product.sidebar')
                </div>
                <div class="col-lg-9">
                    @include('product.listproduct')
                </div>
            </div>
        </form>
    </div>
@endsection
