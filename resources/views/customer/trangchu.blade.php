@extends('customer.layout')
@section('title')
    Trang chủ | Công ty TNHH ĐẠI PHONG
@endsection
@section('content')
    <!-- CAROUSEL -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/slice-01.jpg') }}" alt="First slide" />
                <div class="carousel-caption">
                    <h5>Hotline: 0976742032</h5>
                    <p>
                       CÔNG TY TNHH ĐẠI PHONG XIN KÍNH CHÀO QUÝ KHÁCH
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/slice-02.jpg') }}" alt="Second slide" />
                <div class="carousel-caption">
                    <h5>Hotline: 0976742032</h5>
                    <p>
                       CÔNG TY TNHH ĐẠI PHONG XIN KÍNH CHÀO QUÝ KHÁCH
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/slice-03.jpg') }}" alt="Third slide" />
                <div class="carousel-caption">
                    <h5>Hotline: 0976742032</h5>
                    <p>
                       CÔNG TY TNHH ĐẠI PHONG XIN KÍNH CHÀO QUÝ KHÁCH
                    </p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <i class="fa-solid fa-chevron-left fa-2xl"></i>
            <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <i class="fa-solid fa-chevron-right fa-2xl"></i>
            <!-- <span style="color: red;" class="carousel-control-next-icon" aria-hidden="true"></span> -->
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- END CAROUSEL -->

    <!-- PRODUCT -->
    <div class="mt-3 section-center">
        <img src="{{ asset('images/arrow-left.svg') }}" alt="Arrow Left" />
        <h3 class="every-header">SẢN PHẨM</h3>
        <img src="{{ asset('images/arrow-right.svg') }}" alt="Arrow Right" />
    </div>
    <div class="container product">
        <div class="row">
            @if (isset($sanpham))
                @foreach ($sanpham->items() as $i)
                    <div class="col-6 col-md-3">
                        <div class="card text-white background-product">
                            <img class="card-img-top"
                                src="{{ asset('../../../../../uploads/' . json_decode($i->hinhanh, true)[0]) }}"
                                alt="" />
                            <div class="card-body">
                                <h4 class="card-title">{{ $i->tieude }}</h4>
                                <p style="color: #da2c38" class="card-text">Giá: {{ $i->gia }}</p>
                                <div class="text-right">
                                    <a href="{{ route('sanphamchitiet', ['sen' => $i->sen, 'id' => $i->id]) }}">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif


        </div>
    </div>
    <!-- PAGINATION -->
    <nav class="wrap-pagination">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ $sanpham->previousPageUrl() }}">Trang trước</a>
            </li>
            {{-- @for ($i = 0; $i < $tintuc->lastPage(); $i++)
            <li class="page-item {{$tintuc->currentPage()===$i+1 ? 'active' :''}}"><a class="page-link" href="{{$tintuc->url($i+1)}}">{{$i+1}}</a></li>    
            @endfor --}}

            <li class="page-item">
                <a class="page-link" href="{{ $sanpham->nextPageUrl() }}">Trang sau</a>
            </li>
        </ul>
    </nav>
    <!-- END PAGINATION -->
    <!-- END PRODUCT -->
    <!-- VIDEO -->
    <div class="mt-3 section-center">
        <img src="{{ asset('images/arrow-left.svg') }}" alt="Arrow Left" />
        <h3 class="every-header">VIDEO</h3>
        <img src="{{ asset('images/arrow-right.svg') }}" alt="Arrow Right" />
    </div>
    <div class="container">
        <p class="text-center">
            Dịch vụ vẩn chuyển sẽ có mặt tại mọi nơi, từ đồng bằng đến thành phố để đáp ứng nhu cầu thanh lý máy biến áp.
            Chúng tôi hân hạn được đồng hành cùng quý khách hàng.
        </p>
    </div>
    <div class="embed-responsive embed-responsive-21by9">
        <video controls>
            <source src="{{ asset('images/video-van-chuyen-may-bien-ap.mp4') }}" type="video/mp4" />
        </video>
    </div>
    <!-- END VIDEO -->
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
