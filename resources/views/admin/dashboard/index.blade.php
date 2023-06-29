@extends('admin.layout')
@section('title')
Dashboard
    
@endsection
@section('content')
<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Danh mục</h3>

              <p>Cấu hình cho danh sách sản phẩm</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admindanhmuc.danh-muc.index') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Sản phẩm</h3>

              <p> <a style="color: white" href="{{ route('adminsanpham.san-pham.create') }}">+ Thêm sản phẩm</a></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('adminsanpham.san-pham.index', ['id'=>1]) }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>TIN TỨC</h3>

              <p><a href="{{ route('admintintuc.tin-tuc.create') }}">+ Thêm tin tức</a></p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admintintuc.tin-tuc.index') }}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>Giới thiệu</h3>

              <p><a href="{{ route('admingioithieu.gioi-thieu.edit', ['id'=>1]) }}">Sửa giới thiệu</a></p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{ route('admingioithieu.gioi-thieu.index') }}" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
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
</div>
    
@endsection