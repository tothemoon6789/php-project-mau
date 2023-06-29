@extends('admin.layout')
@section('title')
    @if (isset($baiviet))
        {{ $baiviet->tieude }}
    @endif
@endsection
@section('content')
    @if (isset($baiviet))
        <div class="container" style="padding-top: 20px">
            {{-- <div class="row"> --}}
            {{-- <div class="col-12 col-md-2">
                <img width="100%" height="100%" style="object-fit: cover" src="{{ asset($baiviet->hinhanh) }}" alt="...">
            </div>
            <div class="col-12 col-md-10"> --}}
            <h6>Tiêu đề: </h6>
            <h2 style="text-indent: 50px"> {{ $baiviet->tieude }}</h2>
            {{-- </div> --}}
            {{-- <div class="col-12"> --}}
            <h6>Nội dung</h6>
            {!! $baiviet->noidung !!}
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
    @endif
@endsection
