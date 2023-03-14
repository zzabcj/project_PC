@extends('layout.master')
@section('content')
        {{-- product info --}}
        @include('product.detail.info')
        <div class="text-bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9">
                        {{-- description --}}
                        @include('product.detail.description')
                    </div>
                    <div class="col-xl-3">
                        {{-- more --}}
                        @include('product.detail.more')
                    </div>
                </div>
            </div>
        </div>
{{--        relate --}}
        @include('product.detail.relate')
{{--        rate --}}
        @include('product.detail.rate')
@endsection
