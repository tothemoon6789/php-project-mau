@extends('admin.layout')
@section('title')
    Giới thiệu
@endsection
@section('content')
    @if (isset($gioithieu))
        <div class="container" style="padding-top: 20px">
            {!! $gioithieu->gioithieu !!}
        </div>
    @endif
@endsection
