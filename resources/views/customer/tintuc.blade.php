@extends('customer.layout')
@section('title')
    Tin tức | Công ty TNHH ĐẠI PHONG
@endsection

@section('content')
<div class="mt-3 section-center">
    <img src="{{ asset('images/wave-left.svg') }}" alt="wave" srcset="">
    <h3 class="every-header">TIN TỨC</h3>
    <img src="{{ asset('images/wave-right.svg') }}" alt="wave" srcset="">
</div>
{{-- @dd($tintuc->data) --}}
    @if (isset($tintuc))
        <div class="container">
            <div class="tin-tuc">
                @foreach ($tintuc->items() as $i)
                    <div class="item">
                        <div class="left">
                            <img src="{{ asset($i->hinhanh) }}" alt="" srcset="">
                        </div>
                        <div class="right">
                            <span class="material-symbols-outlined">
                                update
                            </span>
                            <span>
                                {{ $i->updated_at->format("d/m/Y") }}</span>
                            <h4>{{ $i->tieude }}</h4>
                            <div class="xem-them">
                                <a href="{{ route('tintucchitiet', ['sen'=>$i->sen,'id'=>$i->id]) }}">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </div>
            <!-- PAGINATION -->
            <nav class="wrap-pagination">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="{{ $tintuc->previousPageUrl() }}">Trang trước</a>
                    </li>
                    {{-- @for ($i = 0; $i < $tintuc->lastPage(); $i++)
                    <li class="page-item {{$tintuc->currentPage()===$i+1 ? 'active' :''}}"><a class="page-link" href="{{$tintuc->url($i+1)}}">{{$i+1}}</a></li>    
                    @endfor --}}
                    
                    <li class="page-item">
                        <a class="page-link" href="{{$tintuc->nextPageUrl()}}">Trang sau</a>
                    </li>
                </ul>
            </nav>
            <!-- END PAGINATION -->
        </div>
    @endif
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
