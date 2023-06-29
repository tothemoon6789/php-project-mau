@extends('customer.layout')
@section('title')
    @if (isset($tintucchitiet))
        {{$tintucchitiet->tieude}}
    @endif
@endsection
@section('content')
<div class="container mt-2">
    <img src="{{ asset($tintucchitiet->hinhanh) }}" style="width: 100%;height: 200px; object-fit: cover" alt="">
    <span class="material-symbols-outlined">
        update
    </span>
    <span>
        {{ $tintucchitiet->updated_at->format("d/m/Y") }}</span>
    <h1>{{$tintucchitiet->tieude}}</h1>
    <div>{!!$tintucchitiet->noidung!!}</div>
    <h6>Tác giả: Admin</h6>
    <h6>Cập nhật: <span class="material-symbols-outlined">
        update
    </span>
    <span>
        {{ $tintucchitiet->updated_at->format("d/m/Y") }}</span></h6>
</div>
@endsection
@section('script')
    <!-- countup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"
        integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/jquery.countup.js') }}"></script>
    <script>
        $(".counter").countUp();
    </script>
@endsection
