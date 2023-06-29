@extends('customer.layout')
@section('title')
    @if (isset($sanphamchitiet))
        {{ $sanphamchitiet->tieude }}
    @endif
@endsection
@section('content')
    @if (isset($sanphamchitiet))
        <div class="container pt-5 detail-product">
            <div class="row">

            
            <div class="col-12 col-md-4 border">
                <div class="slider-for">
                    @foreach (json_decode($sanphamchitiet->hinhanh, true) as $item)
                        <div>
                            <img height="300px" width="100%" style="object-fit: cover" src="{{ asset('../../../../../uploads/'.$item) }}" alt="...">
                        </div>
                    @endforeach
                </div>
                <div class="slider-nav">
                    @foreach (json_decode($sanphamchitiet->hinhanh, true) as $item)
                        <div class="p-2">
                            <img width="100px" height="100px" style="object-fit: cover; padding: 10px;" src="{{ asset('../../../../../uploads/'.$item) }}" alt="...">
                        </div>
                    @endforeach
                </div>
                <p class="text-center">Hình ảnh: {{ $sanphamchitiet->tieude }}</p>
            </div>
            <div class="col-12 col-md-8">
                <h1>{{ $sanphamchitiet->tieude }}</h1>
                <div class="bg-dark text-light p-3">

                    <p style="font-weight: 500">Giá: {{ $sanphamchitiet->gia }}</p>
                </div>
                <div>{!! $sanphamchitiet->mota !!}</div>
                <div class="icon">

                    <i class="fa-brands fa-square-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
                <hr>
            </div>
            <div class="col-12 col-md-12 mt-4">
                
                
                <h2>Mô tả</h2>
                <div>{!! $sanphamchitiet->noidung !!}</div>
            </div>
        </div>
        </div>
    @endif
@endsection
@section('script')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
    {{-- slick --}}
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
    </script>
    <!-- countup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"
        integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/jquery.countup.js') }}"></script>
    <script>
        $(".counter").countUp();
    </script>
@endsection
