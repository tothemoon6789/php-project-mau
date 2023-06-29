@extends('admin.layout')
@section('title')
    Liên hệ
@endsection
@section('content')
    @if (isset($lienhe))
        <div class="container" style="padding-top: 20px">
            {!! $lienhe->lienhe !!}
        </div>
    @endif
@endsection
