@extends('admin.layout')

@section('title')
    Tấc cả sản phẩm
@endsection
@section('content')
    <style>
        @media (min-width:1200px) {
            .td-noidung {
                max-width: 700px;
            }
        }
    </style>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <style>
    </style>
    <table class="table table-hover">
        <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>DANH MỤC</th>
                <th>HÌNH ẢNH</th>
                <th>SẢN PHẨM</th>
                <th>GÍA</th>
                {{-- <th>NỘI DUNG</th> --}}
                <th>HÀNH ĐỘNG</th>
            </tr>
        </thead>
        <tbody>

            @if (isset($sanpham))
                @foreach ($sanpham as $i)
                    <tr>
                        <td>{{ $i->id }}</td>
                        <td>{{ $i->danhmuccaphai }}</td>
                        <td>
                            @foreach (json_decode($i->hinhanh, true) as $h)
                                <img width="40px" style="object-fit: cover; margin: 5px" height="40px"
                                    src="{{ asset('../../../uploads/'.$h) }}">
                            @endforeach
                        </td>
                        <td style="max-width: 250px"><a
                                href="{{ route('adminsanpham.san-pham.show', ['id' => $i->id]) }}">{{ $i->tieude }}</a>
                        </td>
                        <td>{{ $i->gia }}</td>
                        {{-- <td>
                            <div class="td-noidung" style="max-height: 250px; overflow: auto;">{!! $i->noidung !!}</div>
                        </td> --}}
                        <td class="d-flex align-items-center">
                            <a class="mr-2" href="{{ route('adminsanpham.san-pham.show', ['id' => $i->id]) }}">Xem</a>
                            <form action="{{ route('adminsanpham.san-pham.update', ['id' => $i->id]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning btn-sm">Sửa</button>
                            </form>
                            <form action="{{ route('adminsanpham.san-pham.destroy', ['id' => $i->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-2">Xoá</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
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
