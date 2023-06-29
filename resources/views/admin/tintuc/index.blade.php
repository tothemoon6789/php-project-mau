@extends('admin.layout')

@section('title')
    Toàn bộ tin tức
@endsection
@section('content')
<style>
    @media (min-width:1200px){
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
    <table class="table table-hover  table-responsive">
        <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>HÌNH ẢNH</th>
                <th>TIÊU ĐỀ</th>
                <th>NỘI DUNG</th>
                <th>HÀNH ĐỘNG</th>
            </tr>
            </thead>
            <tbody>
            @if (isset($tintuc))
                @foreach ($tintuc as $i)
                <tr>
                    <td>{{$i->id}}</td>
                    <td><img width="100px" style="object-fit: cover" height="100px" src="{{ asset($i->hinhanh) }}" ></td>
                    <td style="max-width: 250px"><a href="{{ route('admintintuc.tin-tuc.show', ['id'=>$i->id]) }}">{{$i->tieude}}</a></td>
                    <td><div class="td-noidung" style="max-height: 250px; overflow: auto;">{!!$i->noidung!!}</div></td>
                    <td class="d-flex align-items-center">
                        <a class="mr-2" href="{{ route('admintintuc.tin-tuc.show', ['id' => $i->id]) }}">Xem</a>
                        <form action="{{ route('admintintuc.tin-tuc.update', ['id'=>$i->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning btn-sm">Sửa</button>
                        </form>
                        <form action="{{ route('admintintuc.tin-tuc.destroy', ['id'=>$i->id]) }}" method="POST">
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
