@extends('admin.layout')
@section('title')
    @if (isset($baiviet))
        {{ $baiviet->tieude }}
    @endif
@endsection
@section('content')
    @if (isset($baiviet))
        <div class="container pt-5">
            <div class="row">

            
            <div class="col-12 col-md-4">
                <div class="slider-for">
                    @foreach (json_decode($baiviet->hinhanh, true) as $item)
                        <div>
                            <img height="300px" width="100%" style="object-fit: cover" src="{{ asset('../../../../../uploads/'.$item) }}" alt="...">
                        </div>
                    @endforeach
                </div>
                <div class="slider-nav">
                    @foreach (json_decode($baiviet->hinhanh, true) as $item)
                        <div class="p-2">
                            <img width="100px" height="100px" style="object-fit: cover; padding: 10px;" src="{{ asset('../../../../../uploads/'.$item) }}" alt="...">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-md-8">
                <h6 style="text-decoration: underline; font-weight: 700;">Sản phẩm:</h6>
                <p style="font-weight: 500">{{ $baiviet->tieude }}</p>
                <h6 style="text-decoration: underline; font-weight: 700;">Gía:</h6>
                <p style="font-weight: 500">{{ $baiviet->gia }}</p>
                <hr>
                <h6 style="text-decoration: underline; font-weight: 700;">Mô tả ngắn:</h6>
                <div>{!! $baiviet->mota !!}</div>
                <hr>
            </div>
            <div class="col-12 col-md-12">
                
                <h6 style="text-decoration: underline; font-weight: 700;">Nội dung:</h6>
                <div>{!! $baiviet->noidung !!}</div>
            </div>
        </div>
        </div>
    @endif
@endsection
@section('script')
    <script type="text/javascript">
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
@endsection
