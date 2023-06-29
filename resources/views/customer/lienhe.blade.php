@extends('customer.layout')
@section('title')
    Liên hệ | Công ty TNHH ĐẠI PHONG
@endsection
@section('content')
<div class="mt-3 section-center">
    <img src="{{ asset('images/wave-left.svg') }}" alt="wave" srcset="">
    <h3 class="every-header">LIÊN HỆ</h3>
    <img src="{{ asset('images/wave-right.svg') }}" alt="wave" srcset="">
</div>
    @if (isset($lienhe))
        <div class="container">
            {!! $lienhe->lienhe !!}
        </div>
    @endif
@endsection
<!-- countup -->
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

