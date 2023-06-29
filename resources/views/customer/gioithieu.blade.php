@extends('customer.layout')
@section('title')
    Giới thiệu | Công ty TNHH ĐẠI PHONG
@endsection
@section('content')
    <div class="mt-3 section-center">
        <img src="{{ asset('images/wave-left.svg') }}" alt="wave" srcset="">
        <h3 class="every-header">GIỚI THIỆU</h3>
        <img src="{{ asset('images/wave-right.svg') }}" alt="wave" srcset="">
    </div>
    @if (isset($gioithieu))
        <div class="container">
            {!! $gioithieu->gioithieu !!}
        </div>
    @endif
@endsection
