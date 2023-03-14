@extends('layout.master')
@section('content')
{{--    carousel --}}
    @include('home.carousel')
{{-- preferential --}}
    @include('home.preferential')
{{--    hot product --}}
    @include('home.hotProduct')
{{--    deal of day --}}
    @include('home.dealOfDays')
{{--    pc gaming --}}
    @include('home.pcgaming')
@endsection
