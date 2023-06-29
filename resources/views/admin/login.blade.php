<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link rel="shortcut icon" href={{ asset('app/daiphonglogo.svg') }} type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset('adminlayout/plugins/fontawesome-free/css/all.min.css') }}>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href={{ asset('adminlayout/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('adminlayout/dist/css/adminlte.min.css') }}>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <img src={{ asset('images/daiphonglogo.svg') }} alt="Admin Dai phong">
            <h4><b>Admin</b> CT TNHH ĐẠI PHONG</h4>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Đăng nhập để vào trang điều khiển.</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($accounterror)
                    <div class="alert alert-danger" role="alert">
                      <strong>Chú ý !</strong> {{$accounterror}}
                    </div>
                @endif
                <form action="login" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <input name="user" type="text" class="form-control" placeholder="Tên đăng nhập">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        {{-- <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ghi nhớ
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src={{ asset('adminlayout/plugins/jquery/jquery.min.js') }}></script>

    <!-- Bootstrap 4 -->
    <script src={{ asset('adminlayout/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('adminlayout/dist/js/adminlte.min.js') }}></script>
</body>

</html>
