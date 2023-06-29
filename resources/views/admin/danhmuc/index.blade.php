@extends('admin.layout')

@section('title')
    Thêm danh mục
@endsection
@section('content')
    <div class="container pt-5">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        {{-- VALIDATE FORM INPUT 1 --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Danh mục cấp 1</h3>
                    </div>
                    <div class="card-body">
                        {{-- FORM INPUT 1 --}}
                        <div class="card text-white bg-light">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admindanhmuc.danh-muc.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="danhmuccapmot">Danh mục cấp 1</label>
                                        <input type="text" class="form-control" name="danhmuccapmot" id="danhmuccapmot"
                                            aria-describedby="helpId" placeholder="Nhập danh mục cấp 1 ?">
                                        <button type="submit" class="btn btn-primary mt-2">Tải lên</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        {{-- TABLE DANH MUC --}}
                        @if (isset($danhmuccapmot))
                            <table class="table table-hover table-inverse table-responsive">
                                <thead class="thead-default">
                                    <tr>
                                        <th>ID</th>
                                        <th>Danh mục cấp 1</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($danhmuccapmot as $i)
                                        <tr>
                                            <td>{{$i->id}}</td>
                                            <td>{{ $i->danhmuccapmot }}</td>
                                            <td class="d-flex">
                                                <form class="mr-2" action="{{ route('admindanhmuc.danh-muc.destroy', ['id'=>$i->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-sm">Xoá</button>
                                                </form>
                                                <button
                                                    onclick="(function(){document.getElementById('{{ 'danhmuc' . $i->id }}').classList.remove('d-none');})()"
                                                    type="button" class="btn btn-outline-warning btn-sm">Sửa</button>
                                            </td>
                                        </tr>
                                        <tr id={{ 'danhmuc' . $i->id }} class="d-none">
                                            <form class="mr-2" action="{{ route('admindanhmuc.danh-muc.update', ['id'=>$i->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <td>
                                                    <div class="form-group">
                                                        <label for="danhmuccapmot">Sửa</label>
                                                        <input value="{{ $i->danhmuccapmot }}" type="text"
                                                            class="form-control" name="danhmuccapmot" id="danhmuccapmot"
                                                            aria-describedby="helpId" placeholder="Điên thông tin">
                                                    </div>
                                                </td>
                                                <td>

                                                    <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>

                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                        <hr>
                    </div>

                    <!-- /.card-body -->
                </div>

            </div>
            <div class="col-12 col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Danh mục cấp 2</h3>
                    </div>
                    <div class="card-body">
                        <div class="card bg-light">
                            <div class="card-body">
                                <form action="{{ route('admindanhmuc.danh-muc.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="danhmuccapmot">Danh mục cấp 1</label>
                                            <select class="form-control" name="danhmuccapmot">
                                                @if (isset($danhmuccapmot))
                                                    @foreach ($danhmuccapmot as $i)
                                                        <option>{{ $i->danhmuccapmot }}</option>
                                                    @endforeach
                                                @endif

                                            </select>
                                        </div>
                                        <label for="nganh">Danh mục cấp 2</label>
                                        <input type="text" class="form-control" name="danhmuccaphai" id="danhmuccaphai"
                                            placeholder="Điền danh mục cấp 2">
                                        <button type="submit" class="btn btn-primary mt-2">Tải lên</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (isset($danhmuccaphai))
                            <table class="table table-hover table-inverse table-responsive">
                                <thead class="thead-default">
                                    <tr>
                                        <th>ID</th>
                                        <th>Danh mục cấp 1</th>
                                        <th>Danh mục cấp 2</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($danhmuccaphai as $i)
                                        <tr>
                                            <td>{{ $i->id }}</td>
                                            <td>{{ $i->danhmuccapmot }}</td>
                                            <td>{{ $i->danhmuccaphai }}</td>
                                            <td class="d-flex">
                                                <form action="{{ route('admindanhmuc.danh-muc.destroy', ['id'=>$i->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="danhmuccaphai">
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-sm mr-2">Xoá</button>
                                                </form>
                                                <button
                                                    onclick="(function(){document.getElementById('{{ 'nganh' . $i->id }}').classList.remove('d-none');})()"
                                                    type="button" class="btn btn-outline-warning btn-sm">Sửa</button>
                                            </td>
                                        </tr>
                                        <tr id={{ 'nganh' . $i->id }} class="d-none">
                                            <form class="mr-2" action="{{ route('admindanhmuc.danh-muc.update', ['id'=>$i->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('PATCH')
                                                <td>
                                                    <div class="form-group">
                                                        <label for="danhmuccaphai">Sửa</label>
                                                        <input type="hidden" value="{{ $i->danhmuccapmot}}" name="danhmuccapmot">
                                                        <input value="{{ $i->danhmuccaphai }}" type="text"
                                                            class="form-control" name="danhmuccaphai" id="nganh"
                                                            placeholder="Điên thông tin">
                                                    </div>
                                                </td>
                                                <td>

                                                    <button type="submit" class="btn btn-primary btn-sm">Cập nhật</button>

                                                </td>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
