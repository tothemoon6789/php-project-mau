@extends('admin.layout')

@section('title')
    Viết tin
@endsection
@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Thêm tin tức</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item">Tin tức</li>
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
                <form action="{{ route('admintintuc.tin-tuc.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label for="tieude">Tiêu đề</label>
                        <input type="text" class="form-control" name="tieude" id="tieude" aria-describedby="helpId"
                            placeholder="Nhập tiêu đề">
                    </div>
                    <div class="form-group">
                        <label for="hinhanh">Hình ảnh</label><br>
                        <img style="object-fit: cover" id="output" width="150px" height="150px" src="{{ asset('adminlayout/dist/img/image-placeholder.svg') }}" alt="Hình ảnh">
                        <input type="file" accept="image/*" onchange="loadFile(event)" class="form-control"
                            name="hinhanh" id="imgInp">
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
            selector: 'textarea',

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
@endsection
