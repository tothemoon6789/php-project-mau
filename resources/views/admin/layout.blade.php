<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/daiphonglogo.svg') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset('adminlayout/plugins/fontawesome-free/css/all.min.css') }}>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href={{ asset('adminlayout/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}>
    <!-- iCheck -->
    <link rel="stylesheet" href={{ asset('adminlayout/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}>
    <!-- JQVMap -->
    <link rel="stylesheet" href={{ asset('adminlayout/plugins/jqvmap/jqvmap.min.css') }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('adminlayout/dist/css/adminlte.min.css') }}>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href={{ asset('adminlayout/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}>
    <!-- Daterange picker -->
    <link rel="stylesheet" href={{ asset('adminlayout/plugins/daterangepicker/daterangepicker.css') }}>
    <!-- summernote -->
    <link rel="stylesheet" href={{ asset('adminlayout/plugins/summernote/summernote-bs4.min.css') }}>
    {{-- tiny editor --}}
    {{-- <script src="https://cdn.tiny.cloud/1/tley2aen1lwhx9bs16jdd492vpngi138gdi23ojmryw2zoia/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="https://cdn.tiny.cloud/1/nnd7pakaxqr7isf3oqefsdlew1jsidgl78umfeus6tg21ng0/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    {{-- SLICK --}}
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src={{ asset('images/daiphonglogo.svg') }} alt="Dai Phong Logo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('trangchu') }}" class="nav-link">Home</a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src={{ asset('adminlayout/dist/img/user1-128x128.jpg') }} alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src={{ asset('adminlayout/dist/img/user8-128x128.jpg') }} alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src={{ asset('adminlayout/dist/img/user3-128x128.jpg') }} alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" 
                        href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.index') }}" class="brand-link">
                <img src={{ asset('images/daiphonglogo.svg') }} alt="Admin Dai Phong Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">ĐẠI PHONG ADMIN</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        {{-- SAN PHAM --}}
                        <li class="nav-item {{ request()->is('admin/danh-muc') ? 'menu-open' : '' }} {{ request()->is('admin/danh-muc/create') ? 'menu-open' : '' }}">
                            <a href="{{ route('admindanhmuc.danh-muc.index') }}" class="nav-link {{ request()->is('admin/danh-muc') ? 'active' : '' }} {{ request()->is('admin/danh-muc/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-list-ol"></i>
                                <p>
                                    DANH MỤC
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admindanhmuc.danh-muc.index') }}" class="nav-link {{ request()->is('admin/danh-muc') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Toàn bộ danh mục</p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ route('admindanhmuc.danh-muc.create') }}" class="nav-link {{ request()->is('admindanhmuc.danh-muc.create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm danh mục</p>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                        {{-- END SAN PHAM --}}
                        <li class="nav-item {{ request()->is('admin/san-pham') ? 'menu-open' : '' }} {{ request()->is('admin/san-pham/create') ? 'menu-open' : '' }}">
                            <a href="{{ route('adminsanpham.san-pham.index') }}" class="nav-link {{ request()->is('admin/san-pham') ? 'active' : '' }} {{ request()->is('admin/san-pham/create') ? 'active' : '' }}">
                                <i class="nav-icon fab fa-product-hunt"></i>
                                <p>
                                    SẢN PHẨM
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('adminsanpham.san-pham.index') }}" class="nav-link {{ request()->is('admin/san-pham') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Toàn bộ sản phẩm</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('adminsanpham.san-pham.create') }}" class="nav-link {{ request()->is('admin/san-pham/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm sản phẩm</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- END SAN PHAM --}}
                        {{-- TIN TUC --}}
                        <li class="nav-item {{ request()->is('admin/tin-tuc') ? 'menu-open' : '' }} {{ request()->is('admin/tin-tuc/create') ? 'menu-open' : '' }}">
                            <a href="{{ route('admintintuc.tin-tuc.index') }}" class="nav-link {{ request()->is('admin/tin-tuc') ? 'active' : '' }} {{ request()->is('admin/tin-tuc/create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-info-circle"></i>
                                <p>
                                    TIN TỨC
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admintintuc.tin-tuc.index') }}" class="nav-link {{ request()->is('admin/tin-tuc') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Toàn bộ tin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admintintuc.tin-tuc.create') }}" class="nav-link {{ request()->is('admin/tin-tuc/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm tin</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- END TIN TUC --}}
                        {{-- GIOI THIEU --}}
                        <li class="nav-item {{ request()->is('admin/gioi-thieu') ? 'menu-open' : '' }} {{ request()->is('admin/gioi-thieu/1/edit') ? 'menu-open' : '' }}">
                            <a href="{{ route('admingioithieu.gioi-thieu.index') }}" class="nav-link {{ request()->is('admin/gioi-thieu/1/edit') ? 'active' : '' }} {{ request()->is('admin/gioi-thieu') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-sitemap"></i>
                                <p>
                                    GIỚI THIỆU
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admingioithieu.gioi-thieu.index') }}" class="nav-link {{ request()->is('admin/gioi-thieu') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Xem</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admingioithieu.gioi-thieu.edit',['id'=>1]) }}" class="nav-link {{ request()->is('admin/gioi-thieu/1/edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sửa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- END GIOI THIEU --}}
                        {{-- LIEN HE --}}
                        <li class="nav-item {{ request()->is('admin/lien-he') ? 'menu-open' : '' }} {{ request()->is('admin/lien-he/1/edit') ? 'menu-open' : '' }}">
                            <a href="{{ route('adminlienhe.lien-he.index') }}" class="nav-link {{ request()->is('admin/lien-he/1/edit') ? 'active' : '' }} {{ request()->is('admin/lien-he') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-id-card"></i>
                                <p>
                                    LIÊN HỆ
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('adminlienhe.lien-he.index') }}" class="nav-link {{ request()->is('admin/lien-he') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Xem</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('adminlienhe.lien-he.edit',['id'=>1]) }}" class="nav-link {{ request()->is('admin/lien-he/1/edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sửa</p>
                                    </a>
                                </li>
                            </ul>
                            
                        </li>
                        <li class="nav-item {{ request()->is('admin/lien-he') ? 'menu-open' : '' }} {{ request()->is('admin/lien-he/1/edit') ? 'menu-open' : '' }}">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i style="color:red" class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    ĐĂNG XUẤT
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            
                            
                        </li>
                       
                        
                        {{--ẸND LIEN HE --}}


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @yield('header')
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="{{ route('admin.index') }}">DaiPhong Admin</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src={{ asset('adminlayout/plugins/jquery/jquery.min.js') }}></script>
    <!-- jQuery UI 1.11.4 -->
    <script src={{ asset('adminlayout/plugins/jquery-ui/jquery-ui.min.js') }}></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src={{ asset('adminlayout/plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- ChartJS -->
    <script src={{ asset('adminlayout/plugins/chart.js/Chart.min.js') }}></script>
    <!-- Sparkline -->
    <script src={{ asset('adminlayout/plugins/sparklines/sparkline.js') }}></script>
    <!-- JQVMap -->
    <script src={{ asset('adminlayout/plugins/jqvmap/jquery.vmap.min.js') }}></script>
    <script src={{ asset('adminlayout/plugins/jqvmap/maps/jquery.vmap.usa.js') }}></script>
    <!-- jQuery Knob Chart -->
    <script src={{ asset('adminlayout/plugins/jquery-knob/jquery.knob.min.js') }}></script>
    <!-- daterangepicker -->
    <script src={{ asset('adminlayout/plugins/moment/moment.min.js') }}></script>
    <script src={{ asset('adminlayout/plugins/daterangepicker/daterangepicker.js') }}></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src={{ asset('adminlayout/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}></script>
    <!-- Summernote -->
    <script src={{ asset('adminlayout/plugins/summernote/summernote-bs4.min.js') }}></script>
    <!-- overlayScrollbars -->
    <script src={{ asset('adminlayout/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}></script>
    <!-- AdminLTE App -->
    <script src={{ asset('adminlayout/dist/js/adminlte.js') }}></script>
    <!-- AdminLTE for demo purposes -->
    <script src={{ asset('adminlayout/dist/js/demo.js') }}></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src={{ asset('adminlayout/dist/js/pages/dashboard.js') }}></script>
    {{-- slick --}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    @yield('script')

</body>

</html>
