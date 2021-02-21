<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomePet</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/Admin/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/Admin/bootstrap/css/bootstrap.min.css')}}" />
    <script src="https://kit.fontawesome.com/194e38739f.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid" id="body">
        <header class="row">
            <div class="col header__logo">
                <div class="row align-items-center">
                    <div class="col-3">
                        <img src="{{asset('public/Admin/img/logo/Logo-header.png')}}" alt="logo" class="header__logo--img" />
                    </div>
                    <div class="col header_title">
                        <h5>TRANG QUẢN LÝ BÁN HÀNG</h5>
                    </div>
                    <div class="col-2">
                        <a name="" id="" class="header__list-title--btn --btn" href="#">
                            ĐĂNG XUẤT
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <br>
        <hr class="hr">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 mt-3">
                    <div class="admin-category__list">
                        <ul id="list-order" class="row">
                            <span>QL ĐƠN HÀNG</span>
                            <li class="admin-category__item order"><a href="{{URL:: to ('list-order')}}">DS ĐƠN HÀNG</a></li>
                            <li class="admin-category__item order"><a href="{{URL:: to ('form-order')}}">THỐNG KÊ ĐƠN HÀNG</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-personnel" class="row">
                            <span>QL NHÂN VIÊN</span>
                            <li class="admin-category__item personnel"><a href="{{URL:: to ('list-personnel')}}">DS NHÂN VIÊN</a></li>
                            <li class="admin-category__item personnel"><a href="{{URL:: to ('add-personnel')}}">THÊM NHÂN VIÊN</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-product-type-1" class="row">
                            <span>QL VẬT NUÔI</span>
                            <li class="admin-category__item product-type-1"><a href="{{URL:: to ('list-product-type-1')}}">DS VẬT NUÔI</a></li>
                            <li class="admin-category__item product-type-1"><a href="{{URL:: to ('form-product-type-1')}}">THÊM VẬT NUÔI</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-product-type-2" class="row">
                            <span>QL LOẠI SẢN PHẨM</span>
                            <li class="admin-category__item product-type-2"><a href="{{URL:: to ('list-product-type-2')}}">DS LOẠI SP</a></li>
                            <li class="admin-category__item product-type-2"><a href="{{URL:: to ('form-product-type-2')}}">THÊM LOẠI SP</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-trademark" class="row">
                            <span>QL THƯƠNG HIÊU</span>
                            <li class="admin-category__item trademark"><a href="{{URL:: to ('list-trademark')}}">DS THƯƠNG HIỆU</a></li>
                            <li class="admin-category__item trademark"><a href="{{URL:: to ('form-trademark')}}">THÊM THƯƠNG HIỆU</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-product" class="row">
                            <span>QL SẢN PHẨM</span>
                            <li class="admin-category__item product"><a href="{{URL:: to ('list-product')}}">DS SẢN PHẨM</a></li>
                            <li class="admin-category__item product"><a href="{{URL:: to ('form-product')}}">THÊM SẢN PHẨM</a></li>
                        </ul>
                    </div>



                </div>
                <div class="col-md-10">
                    <br>
                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('public/Admin/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('public/Admin/js/script.js')}}"></script>
    <script src="{{asset('public/Admin/bootstrap/popper.min.js')}}"></script>
    <script src="{{asset('public/Admin/bootstrap/js/bootstrap.min.js')}}"></script>
</body>