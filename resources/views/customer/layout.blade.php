<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/daiphonglogo.svg') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <!-- FONT AWESOME 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500;700&display=swap" rel="stylesheet" />
    <!-- GOOGLE ICON -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    {{-- SLICK --}}
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>

<body>
    
    <!-- BANNER -->
    <div class="container-fluid banner">
        <div class="row">
            <div class="col-12 col-md-4 text-center left-banner">
                <img src="{{ asset('images/daiphonglogo.svg') }}" alt="ĐẠI PHONG LOGO" />
            </div>
            <div class="col-12 col-md-8 d-none d-md-block right-banner">
                <img src="{{ asset('images/banner_top.png') }}" alt="Banner" />
            </div>
        </div>
    </div>
    <!-- END BANNER -->
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ route('trangchu') }}">CT TNHH ĐẠI PHONG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('trangchu') }}">
                        <i class="fa-solid fa-house"></i>TRANG CHỦ</a>
                </li>
                <li class="nav-item {{ request()->is('gioi-thieu') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('gioithieu') }} "><i class="fa-solid fa-shield"></i>GIỚI
                        THIỆU</a>
                </li>
                @if (isset($danhmuccapmot) && isset($danhmuccaphai))
                    
                
                @foreach ($danhmuccapmot as $m)
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                            class="fa-brands fa-product-hunt"></i>{{$m->danhmuccapmot}}</a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      @foreach ($danhmuccaphai as $h)
                      <a class="dropdown-item {{$m->danhmuccapmot === $h->danhmuccapmot ?  '':'d-none'}}" href="{{ route('danhmucsanpham', ['sencapmot'=>$m->sencapmot,'sencaphai'=>$h->sencaphai]) }}">{{$m->danhmuccapmot === $h->danhmuccapmot ?  $h->danhmuccaphai:''}}</a>
                      
                          
                      @endforeach
                        
                        
                        
                    </div>
                </li>
                @endforeach
                @endif
                

                <li class="nav-item {{ request()->is('tin-tuc') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tintuc') }}"><i class="fa-solid fa-circle-info"></i>TIN
                        TỨC</a>
                </li>
                <li class="nav-item {{ request()->is('lien-he') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('lienhe') }} "><i class="fa-solid fa-address-book"></i>LIÊN
                        HỆ</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END NAVBAR -->
    @yield('content')

    <!-- COUNTUPJS -->
    <div class="mt-3 section-center">
        <img src="{{ asset('images/arrow-left.svg') }}" alt="Arrow Left" />
        <h3 class="every-header">HOẠT ĐỘNG</h3>
        
        <img src="{{ asset('images/arrow-right.svg') }}" alt="Arrow Right" />
    </div>
    <div class="container">
        <p class="text-center">Chúng tôi không ngừng cải thiện dịch vụ thu mua máy biến áp, với đội ngũ hùng hậu trải
            dài trên cả nước, chúng tôi luôn có mặt tức thời để đáp ứng nhu cầu thanh lý của quý khách hàng. Chúng tôi
            mong muốn là đối tác thân thiết của quý khách hàng trong tương lại</p>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="counter-container col-6 col-md-3">
                <i class="fa-solid fa-business-time"></i>
                <span>HOẠT ĐỘNG</span>
                <div class="wrap-counter">
                    <span class="counter">10</span>
                    <span>Năm</span>
                </div>
            </div>

            <div class="counter-container col-6 col-md-3">
                <i class="fa-brands fa-product-hunt"></i>
                <span>THU MUA</span>
                <div class="wrap-counter">
                    <span class="counter">212</span>
                    <span>Sản phẩm</span>
                </div>
            </div>

            <div class="counter-container col-6 col-md-3">
                <i class="fa-solid fa-users"></i>
                <span>THÂN THIẾT</span>
                <div class="wrap-counter">
                    <span class="counter"> 156 </span>
                    <span>Khách hàng</span>
                </div>
            </div>

            <div class="counter-container col-6 col-md-3">
                <i class="fa-solid fa-location-dot"></i>
                <span>PHẠM VI</span>
                <div class="wrap-counter">
                    <span class="counter"> 63 </span>
                    <span>Tỉnh thành</span>
                </div>
            </div>
        </div>
    </div>
    <!-- END COUNTUPJS -->
    <!-- GALARY -->
    <div class="mt-3 section-center">
        <img src="{{ asset('images/arrow-left.svg') }}" alt="Arrow Left" />
        <h3 class="every-header">HÌNH ẢNH</h3>
        <img src="{{ asset('images/arrow-right.svg') }}" alt="Arrow Right" />
    </div>
    <div class="container">
        <p class="text-center">
            Hình ảnh thực tế của công ty chúng tôi trong các thương vụ thu mua máy biến áp trên mọi miền tổ quốc Việt
            Nam.
        </p>
    </div>
    <!-- END GALARY -->
    <div class="container">
        <div class="galary">
            <div class="galary-item">
                <img src="{{ asset('images/g-01.jpg') }}" alt="" srcset="" />
            </div>
            <div class="galary-item">
                <img src="{{ asset('images/g-02.jpg') }}" alt="" srcset="" />
            </div>
            <div class="galary-item">
                <img src="{{ asset('images/g-03.jpg') }}" alt="" srcset="" />
            </div>
            <div class="galary-item">
                <img src="{{ asset('images/g-04.jpg') }}" alt="" srcset="" />
            </div>
            <div class="galary-item">
                <img src="{{ asset('images/g-05.jpg') }}" alt="" srcset="" />
            </div>
            <div class="galary-item">
                <img src="{{ asset('images/g-06.jpg') }}" alt="" srcset="" />
            </div>
            <div class="galary-item">
                <img src="{{ asset('images/g-07.jpg') }}" alt="" srcset="" />
            </div>
            <div class="galary-item">
                <img src="{{ asset('images/g-08.jpg') }}" alt="" srcset="" />
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <div class="footer footer-background">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3">
                    <h6>LIÊN HỆ</h6>
                    <ul>
                        <li>CÔNG TY TNHH ĐẠI PHONG</li>
                        <li>
                            Address: Số 98 Đường số 1, Bình Hưng Hoà B, Bình Tân, TP Hồ Chí
                            Minh
                        </li>
                        <li>Tel: <a href="tel:0976742032">0976742032</a></li>
                        <li>
                            Email:
                            <a href="mailto:daiphongtba@gmail.com">daiphongtba@gmail.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                    <h6>Liên kết nhanh</h6>
                    <ul>
                        <li>Giới thiệu</li>
                        <li>Trang chủ</li>
                        <li>Sản phẩm</li>
                        <li>Liên hệ</li>
                        <li>Tin tức</li>
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                    <h6>TUYỂN DỤNG</h6>
                    <ul>
                        <li>Vị trí Kỹ Thuật Viên</li>
                        <li>Vị trí Bán Hàng</li>
                        <li>Vị trí Kế Toán</li>
                        <li>Vị trí Nhân Viên Bảo Vệ</li>
                    </ul>
                </div>
                <div class="col-6 col-md-3">
                    <h6>CHÍNH SÁCH</h6>
                    <ul>
                        <li>Về công ty</li>
                        <li>Lịch sử phát triển</li>
                        <li>Chiến lược phát triển</li>
                        <li>Hệ thống quản trị</li>
                        <li>Nhân sự chủ chốt</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- END FOOTER -->
    <!-- MAP -->
    <div style="height: 300px" class="embed-responsive embed-responsive-16by9">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.0716979763024!2d106.59161627443532!3d10.80582068934472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b8ffc21d7fb%3A0x9f343db901b2687e!2zOTggxJDGsOG7nW5nIFPhu5EgMSwgQsOsbmggSMawbmcgSG_DoCBCLCBCw6xuaCBUw6JuLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1687494296213!5m2!1sen!2s"
            width="600" height="300" style="border: 0" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!-- END MAP -->
    {{-- SOME PHONE FACEBOOK ZALOO --}}

    <div class="contact-zalo">
        <a href="http://zalo.me/0976742032" target="_blank">Zalo</a>
    </div>

    <div class="contact-facebook" style="">
        <a href="https://www.facebook.com/pham.nhiem"
            target="_blank">
            Chat Facebook</a>
    </div>

    <div class="contact-call" style="">

        <a id="callnowbutton" href="tel:0976742032">0976742032</a><i class="fa fa-phone"></i>
    </div>
    {{-- END FACEBOOK ZALO PHONE --}}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
   
    @yield('script')
</body>

</html>
