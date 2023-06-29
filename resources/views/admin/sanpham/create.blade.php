@extends('admin.layout')

@section('title')
    Thêm sản phẩm
@endsection
@section('header')
    <style>
        .list-images {
            width: 50%;
            margin-top: 20px;
            display: inline-block;
        }

        .hidden {
            display: none;
        }

        .box-image {
            width: 100px;
            height: 108px;
            position: relative;
            float: left;
            margin-left: 5px;
        }

        .box-image img {
            width: 100px;
            height: 100px;
        }

        .wrap-btn-delete {
            position: absolute;
            top: -8px;
            right: 0;
            height: 2px;
            font-size: 20px;
            font-weight: bold;
            color: red;
        }

        .btn-delete-image {
            cursor: pointer;
        }

        .table {
            width: 15%;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm sản phẩm</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item">Sản phẩm</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('adminsanpham.san-pham.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="danhmuccaphai">Danh mục</label>
                        <select class="form-control" name="danhmuccaphai" id="danhmuccaphai">
                            @if (isset($danhmuccaphai))
                                @foreach ($danhmuccaphai as $i)
                                    <option value="{{$i->id}}">{{ $i->danhmuccaphai }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tieude">Sản phẩm</label>
                        <input type="text" class="form-control" name="tieude" id="tieude" aria-describedby="helpId"
                            placeholder="Nhập sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="gia">Giá</label>
                        <input type="text" class="form-control" name="gia" id="gia" aria-describedby="helpId"
                            placeholder="Nhập giá">
                    </div>

                    {{-- <div class="form-group">
                        <label for="hinhanh">Hình ảnh</label><br>
                        <img style="object-fit: cover" id="output" width="150px" height="150px"
                            src="{{ asset('adminlayout/dist/img/image-placeholder.svg') }}" alt="Hình ảnh">
                        <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control"
                            name="hinhanh" id="imgInp">
                    </div> --}}
                    {{-- them nhieu hinh anh --}}
                    <div class="form-group hdtuto control-group lst increment">
                        <div class="list-input-hidden-upload">
                            <label for="file_upload">Hình ảnh</label><br>
                            <input type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">
                        </div>
                        <button class="btn btn-success btn-add-image" type="button"><i
                                class="fldemo glyphicon glyphicon-plus"></i>+ Thêm hình ảnh</button>
                        <p>(Cho phép thêm nhiều hình ảnh)</p>
                    </div>
                    <div class="list-images">
                        @if (isset($list_images) && !empty($list_images))
                            @foreach (json_decode($list_images) as $key => $img)
                                <div class="box-image">
                                    <input type="hidden" name="images_uploaded[]" value="{{ $img }}"
                                        id="img-{{ $key }}">
                                    <img src="{{ asset('files/' . $img) }}" class="picture-box">
                                    <div class="wrap-btn-delete"><span data-id="img-{{ $key }}"
                                            class="btn-delete-image">x</span></div>
                                </div>
                            @endforeach
                            <input type="hidden" name="images_uploaded_origin" value="{{ $list_images }}">
                            <input type="hidden" name="id" value="{{ $id }}">
                        @endif
                    </div>
                    {{-- end them nhieu hinh anh --}}
                    <div class="form-group">
                        <label for="mota">Mô tả ngắn</label>
                        <textarea class="form-control" name="mota" id="mota" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="noidung">Nội dung</label>
                        <textarea class="form-control" name="noidung" id="noidung" rows="30"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-2 mb-5">Tải lên</button>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    {{-- for textarea --}}
    <script>
        tinymce.init({
            selector: '#noidung',

            image_class_list: [{
                title: 'img-responsive',
                value: 'img-fluid'
            }, ],
            // height: 500,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            }
        });
    </script>
    {{-- for mota --}}
    <script>
        tinymce.init({
            selector: '#mota',
            plugins: 'anchor autolink charmap codesample emoticons link lists searchreplace visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
    {{-- for mota --}}
    {{-- for img --}}
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
    {{-- upload nhieu hinh --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-add-image").click(function() {
                $('#file_upload').trigger('click');
            });

            $('.list-input-hidden-upload').on('change', '#file_upload', function(event) {
                let today = new Date();
                let time = today.getTime();
                let image = event.target.files[0];
                let file_name = event.target.files[0].name;
                let box_image = $('<div class="box-image"></div>');
                box_image.append('<img src="' + URL.createObjectURL(image) + '" class="picture-box">');
                box_image.append('<div class="wrap-btn-delete"><span data-id=' + time +
                    ' class="btn-delete-image">x</span></div>');
                $(".list-images").append(box_image);




                $(this).removeAttr('id');
                $(this).attr('id', time);
                let input_type_file =
                    '<input type="file" name="filenames[]" id="file_upload" class="myfrm form-control hidden">';
                $('.list-input-hidden-upload').append(input_type_file);
            });

            $(".list-images").on('click', '.btn-delete-image', function() {
                let id = $(this).data('id');
                $('#' + id).remove();
                $(this).parents('.box-image').remove();
            });
        });
    </script>
@endsection
