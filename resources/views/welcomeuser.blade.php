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
                                <form class="form-inline">
                                    <input class="header__search--ip" type="text" placeholder="Bạn muốn mua gì?" />
                                    <button class="header__search--btn" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 col-12 header__list-title">
                <div class="row mt-3">
                    <div class="col-3">
                        <a name="" id="" class="header__list-title--btn --btn" href="#">
                            GIỚI THIỆU
                        </a>
                    </div>
                    <div class="col-3">
                        <a name="" id="" class="header__list-title--btn --btn" href="#">
                            FACEBOOK
                        </a>
                    </div>
                    <div class="col-3">
                        <label for="register" class="header__list-title--btn --btn">ĐĂNG KÝ</label>
                        <input type="checkbox" id="register" hidden class="log-re__input" />
                        <label class="log-re__overlay" for="register"></label>
                        <div class="register">
                            <form action="#" method="POST">
                                <div class="row justify-content-end">
                                    <label class="col-1 log-re__item-close" for="register">
                                        <i class="fas fa-times"></i>
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row log-re__title-1">
                                            <span>ĐĂNG KÝ</span>
                                        </div>
                                        <div class="row log-re__title-2">
                                            <span><i>Vui lòng điền đầy đủ thông tin</i></span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr" />
                                <div class="row log-re__ip">
                                    <div class="col-4">
                                        <label for="name">Họ và tên: </label>
                                    </div>
                                    <div class="col-7">
                                        <div class="row">
                                            <input type="text" placeholder="VD: Nguyễn Văn A" id="name" class="form-control" name="name" onkeyup="xuli_1()" />
                                        </div>
                                        <div class="row">
                                            <div><i class="error" id="error_1"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log-re__ip">
                                    <div class="col-4">
                                        <label for="n-phone">Số điện thoại: </label>
                                    </div>
                                    <div class="col-7">
                                        <div class="row">
                                            <input type="text" placeholder="(+84)" id="n_phone" class="form-control" name="n_phone" onkeyup="xuli_2()" />
                                        </div>
                                        <div class="row">
                                            <div><i class="error" id="error_2"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log-re__ip">
                                    <div class="col-4">
                                        <label for="address">Địa chỉ: </label>
                                    </div>
                                    <div class="col-7">
                                        <div class="row">
                                            <input type="text" placeholder="VD: Vĩnh Long" id="address" class="form-control" name="address" onkeyup="xuli_3()" />
                                        </div>
                                        <div class="row">
                                            <div><i class="error" id="error_3"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr" />
                                <div class="row log-re__ip">
                                    <div class="col-4">
                                        <label for="username">Tên đăng nhập: </label>
                                    </div>
                                    <div class="col-7">
                                        <div class="row">
                                            <input type="text" placeholder="Tên đăng nhập" id="username" class="form-control" name="username" onkeyup="xuli_4()" />
                                        </div>
                                        <div class="row">
                                            <div><i class="error" id="error_4"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log-re__ip">
                                    <div class="col-4">
                                        <label for="password">Mật khẩu: </label>
                                    </div>
                                    <div class="col-7">
                                        <div class="row">
                                            <input type="password" placeholder="Từ 8- 16 kí tự" id="password" class="form-control" name="password" onkeyup="xuli_5()" />
                                        </div>
                                        <div class="row">
                                            <div><i class="error" id="error_5"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log-re__ip">
                                    <div class="col-4">
                                        <label for="re-password">Xác nhận mật khẩu: </label>
                                    </div>
                                    <div class="col-7">
                                        <div class="row">
                                            <input type="password" id="re_password" class="form-control" name="re_password" onkeyup="xuli_6()" />
                                        </div>
                                        <div class="row">
                                            <div><i class="error" id="error_6"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <br />
                                <div class="row justify-content-end">
                                    <div class="col-5 log-re__title-3">
                                        <span>Bạn đã có tài khoản? </span><a href="">Đăng nhập</a>
                                    </div>
                                    <div class="col-5 log-re__btn-submit">
                                        <button type="submit">Xác nhận</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-3">
                        <label for="login" class="header__list-title--btn --btn">ĐĂNG NHẬP</label>
                        <input type="checkbox" id="login" hidden class="log-re__input" />
                        <label class="log-re__overlay" for="login"></label>
                        <div class="login">
                            <form action="">
                                <div class="row justify-content-end">
                                    <label class="col-1 log-re__item-close" for="login">
                                        <i class="fas fa-times"></i>
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row log-re__title-1">
                                            <span>ĐĂNG NHẬP</span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="hr" />
                                <div class="row log-re__ip">
                                    <div class="col-4">
                                        <label for="log-username">Tên đăng nhập: </label>
                                    </div>
                                    <div class="col-7">
                                        <div class="row">
                                            <input type="text" placeholder="Tên đăng nhập" id="log-username" class="form-control" name="log-username" onkeyup="xuli_7()" />
                                        </div>
                                        <div class="row">
                                            <div><i class="error" id="error_7"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row log-re__ip">
                                    <div class="col-4">
                                        <label for="log-password">Mật khẩu: </label>
                                    </div>
                                    <div class="col-7">
                                        <div class="row">
                                            <input type="password" placeholder="Từ 8- 16 kí tự" id="log-password" class="form-control" name="log-password" onkeyup="xuli_8()" />
                                        </div>
                                        <div class="row">
                                            <div><i class="error" id="error_8"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row justify-content-end">
                                    <div class="col-7 log-re__title-3">
                                        <span>Bạn chưa có tài khoản? </span><a href="">Đăng ký</a>
                                    </div>
                                    <div class="col-5 log-re__btn-submit">
                                        <button type="submit">Xác nhận</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
                                <a class="" href="#" data-toggle="dropdown"> THƯƠNG HIỆU </a>
                                <div class="dropdown-content dropdown-menu">
                                    @foreach($trademark as $key)
                                    <a class="dropdown-item" href="#">{{ $key -> TenThuongHieu }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @foreach($type_1 as $key_1)
                        <div class="">
                            <div class="menu__list--item dropdown">
                                <a class="" href="#" data-toggle="dropdown"> {{ $key_1 -> TenThuCung }} </a>
                                <div class="dropdown-content dropdown-menu">
                                    @foreach($type_2 as $key_2)
                                    @if( $key_1 -> MaTC == $key_2 -> MaTC )
                                    <a class="dropdown-item" href="#">{{ $key_2 -> TenNhom}}</a>
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

        <footer class="row"></footer>
    </div>
    <script src="{{asset('public/FrontEnd/js/check-log_res.js')}}"></script>
    <script src="{{asset('public/FrontEnd/bootstrap/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('public/FrontEnd/js/script.js')}}"></script>
    <script src="{{asset('public/FrontEnd/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('public/FrontEnd/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>