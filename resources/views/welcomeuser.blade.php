<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomePet</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/FrontEnd/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/FrontEnd/bootstrap/css/bootstrap.min.css')}}" />
    <script src="https://kit.fontawesome.com/194e38739f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <header class="row">
            <div class="col-md-7 col-sm-12 col-12 header__logo">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('ImageUpload/logo/Logo-header.png')}}" alt="logo" class="header__logo--img" />
                    </div>
                    <div class="col-lg-6 mt-1">
                        <div class="row align-items-lg-end" style="height: 50px">
                            <div class="col">
                                <form class="form-inline" action="{{URL:: to ('store?' )}}" method="GET">
                                    <input class="header__search--ip" type="text" name="search" id="transcript" placeholder="Bạn muốn mua gì?" />
                                    <button class="header__search--btn" id="btn-search" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <span id="voice-search">
                                        <i class="fas fa-microphone"></i>
                                    </span>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-12 header__list-title">
                <div class="row">
                    <div class="col-md-3 col-6">
                        <a class="header__list-title--btn --btn" href="#">
                            GIỚI THIỆU
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a class="header__list-title--btn --btn" href="#">
                            FACEBOOK
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a class="header__list-title--btn --btn" href="{{ URL :: to('register')}}">
                            ĐĂNG KÝ
                        </a>
                    </div>
                    <div class="col-md-3 col-6">
                        <a class="header__list-title--btn --btn" href="{{ URL :: to('login')}}">
                            ĐĂNG NHẬP
                        </a>

                    </div>
                </div>
            </div>
        </header>
        <hr />
        <div class="row">
            <div class="col-md-12 col-12 menu__list">
                <nav class="navbar navbar-expand-md navbar-light">
                    <div class="menu__list--item">
                        <a href="{{ URL :: to('home')}}">TRANG CHỦ</a>
                    </div>
                    <button class="navbar-toggler menu__list--icon" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="menu__list--item">
                            <a href="{{ URL :: to('store')}}">CỬA HÀNG</a>
                        </div>
                        <div class="">
                            <div class="menu__list--item dropdown">
                                <a href="" data-toggle="dropdown"> THƯƠNG HIỆU </a>
                                <div class="dropdown-content dropdown-menu">
                                    @foreach($trademark as $key)
                                    @if($key->TenThuongHieu != 'No brand')
                                    <a class="dropdown-item" href="{{URL:: to ('store?th='.$key -> MaTH )}}">{{ $key -> TenThuongHieu }}</a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @foreach($type_1 as $key_1)
                        <div class="">
                            <div class="menu__list--item dropdown">
                                <a class="" href="" data-toggle="dropdown"> {{ $key_1 -> TenThuCung }} </a>
                                <div class="dropdown-content dropdown-menu">
                                    @foreach($type_2 as $key_2)
                                    @if( $key_1 -> MaTC == $key_2 -> MaTC )
                                    <a class="dropdown-item" href="{{URL:: to ('store?nhom='.$key_2 -> MaNhom )}}">{{ $key_2 -> TenNhom}}</a>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </nav>
            </div>
            <!-- <div class="col-md-2 col-3 menu__cart">
                <div class="menu__cart--icon">
                    <a href=""><i class="fas fa-shopping-cart"></i> (1)</a>
                </div>
            </div> -->
        </div>
        <hr />
        <div class="container-fluid">

            @yield('content')

        </div>
        <hr>
        <footer class="row align-items-center">
            <div class="col-md-5">
                <div class="row">
                    <p>Copyright <i class="far fa-copyright"></i> <a href="">HOME PET | Siêu thị thú cưng</a>. All Rights Reserved</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <h6>THÔNG TIN LIÊN HỆ:</h6>
                </div>
                <div class="row">
                    <span><i class="far fa-map"></i> Địa chỉ: Hưng Lợi, Ninh Kiều, Cần Thơ</span>
                    <span><i class="fas fa-mobile-alt"></i> Số điện thoại: 0971580773</span>
                    <span><i class="far fa-envelope"></i> Gmail: huongb1706705@student.ctu.edu.vn</span>
                </div>
            </div>
            <div class="col-md-3 gr_icon">
                <div class="row justify-content-end">
                    <div class="col-3">
                        <a href="https://www.facebook.com/vic.nguyen.3720" class="icon_footer"><i class="fab fa-facebook"></i></a>
                    </div>
                    <div class="col-3 ">
                        <a href="https://www.messenger.com/" class="icon_footer"><i class="fab fa-facebook-messenger"></i></a>
                    </div>
                    <div class="col-3 ">
                        <a href="https://www.google.com" class="icon_footer"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="col-3 ">
                        <a href="https://www.youtube.com" class="icon_footer"><i class="fab fa-youtube "></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('public/FrontEnd/js/check-log_res.js')}}"></script>
    <script src="{{asset('public/FrontEnd/bootstrap/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('public/FrontEnd/js/script.js')}}"></script>
    <script src="{{asset('public/FrontEnd/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('public/FrontEnd/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>