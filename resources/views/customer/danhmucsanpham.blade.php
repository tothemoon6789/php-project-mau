@extends('customer.layout')
@section('title')
    Danh mục sản phẩm | Công ty TNHH ĐẠI PHONG
@endsection
@section('content')
    <!-- PRODUCT -->
    <div class="mt-3 section-center">
        <img src="{{ asset('images/wave-left.svg') }}" alt="wave" srcset="">
        <h3 class="every-header">SẢN PHẨM</h3>
        <img src="{{ asset('images/wave-right.svg') }}" alt="wave" srcset="">
    </div>
    <div class="container product mt-2">
        <i class="fa-solid fa-chevron-right mt"></i>
        <i class="fa-solid fa-chevron-right mt"></i>
        <h4>{{ $danhmucsanpham[0]->danhmuccapmot }}-{{ $danhmucsanpham[0]->danhmuccaphai }}</h4>

        <div class="row">
            @if (isset($danhmucsanpham))
                @foreach ($danhmucsanpham->items() as $i)
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
                <a class="page-link" href="{{ $danhmucsanpham->previousPageUrl() }}">Trang trước</a>
            </li>
            {{-- @for ($i = 0; $i < $tintuc->lastPage(); $i++)
            <li class="page-item {{$tintuc->currentPage()===$i+1 ? 'active' :''}}"><a class="page-link" href="{{$tintuc->url($i+1)}}">{{$i+1}}</a></li>    
            @endfor --}}

            <li class="page-item">
                <a class="page-link" href="{{ $danhmucsanpham->nextPageUrl() }}">Trang sau</a>
            </li>
        </ul>
    </nav>
    <!-- END PAGINATION -->
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
