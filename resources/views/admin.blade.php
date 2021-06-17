<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomePet</title>
    <link rel="stylesheet" type="text/css" href="{{asset('public/Admin/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/Admin/bootstrap/css/bootstrap.min.css')}}" />
    <script src="https://kit.fontawesome.com/194e38739f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
</head>

<body>
    <?php
    $id_admin = Session()->get('id_admin');
    if (!$id_admin) {
        header("refresh:0; url= home");
        die();
    }

    $message = Session()->get('message');
    if ($message) {
        echo '<span class="message" id="message">' . $message . '</span>';
    }
    Session()->put('message', NULL);
    ?>
    <div class="container-fluid" id="body">
        <header class="row">
            <div class="col header__logo">
                <div class="row align-items-center">
                    <div class="col-3">
                        <img src="{{asset('ImageUpload/logo/Logo-header.png')}}" alt="logo" class="header__logo--img" />
                    </div>
                    <div class="col header_title">
                        <h5>TRANG QUẢN LÝ BÁN HÀNG</h5>
                    </div>
                    <div class="col-3 ">
                        <div class="row m-0 justify-content-center">
                            <div>
                                <ul id="notification">
                                    <span class="header__list-title--btn --btn">
                                        THÔNG BÁO <i class="fas fa-bell"></i> ({{ $count }})
                                    </span>
                                    <div class="notification-list" id="notification-list">
                                        @foreach($notification as $key)
                                        <li>Sản phẩm {{ $key -> TenHH }} sắp hết hàng</li>
                                        @endforeach

                                    </div>
                                </ul>
                            </div>
                            <div>
                                <a class="header__list-title--btn --btn" href="{{ URL :: to('logout_admin')}}">
                                    LOGOUT <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </div>
                        </div>
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
                        <ul id="revenue" class="row">
                            <span>DOANH THU CỬA HÀNG</span>
                            <li class="admin-category__item revenue"><a href="{{URL:: to ('revenue-day')}}">KIỂM KÊ DOANH THU</a></li>
                            <li class="admin-category__item revenue"><a href="{{URL:: to ('chart-day')}}">THỐNG KÊ THEO NGÀY</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-order" class="row">
                            <span>QL ĐƠN HÀNG</span>
                            <li class="admin-category__item order"><a href="{{URL:: to ('list-order?page=1')}}">DS ĐƠN HÀNG</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-personnel" class="row">
                            <span>QL NHÂN VIÊN</span>
                            <li class="admin-category__item personnel"><a href="{{URL:: to ('list-personnel?page=1')}}">DS NHÂN VIÊN</a></li>
                            <li class="admin-category__item personnel"><a href="{{URL:: to ('add-personnel')}}">THÊM NHÂN VIÊN</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-product-type-1" class="row">
                            <span>QL VẬT NUÔI</span>
                            <li class="admin-category__item product-type-1"><a href="{{URL:: to ('list-type-1?page=1')}}">DS VẬT NUÔI</a></li>
                            <li class="admin-category__item product-type-1"><a href="{{URL:: to ('add-type-1')}}">THÊM VẬT NUÔI</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-product-type-2" class="row">
                            <span>QL LOẠI SẢN PHẨM</span>
                            <li class="admin-category__item product-type-2"><a href="{{URL:: to ('list-type-2?page=1')}}">DS LOẠI SP</a></li>
                            <li class="admin-category__item product-type-2"><a href="{{URL:: to ('add-type-2')}}">THÊM LOẠI SP</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-trademark" class="row">
                            <span>QL THƯƠNG HIÊU</span>
                            <li class="admin-category__item trademark"><a href="{{URL:: to ('list-trademark?page=1')}}">DS THƯƠNG HIỆU</a></li>
                            <li class="admin-category__item trademark"><a href="{{URL:: to ('add-trademark')}}">THÊM THƯƠNG HIỆU</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-product" class="row">
                            <span>QL SẢN PHẨM</span>
                            <li class="admin-category__item product"><a href="{{URL:: to ('list-product?page=1')}}">DS SẢN PHẨM</a></li>
                            <li class="admin-category__item product"><a href="{{URL:: to ('add-product')}}">THÊM SẢN PHẨM</a></li>
                        </ul>
                    </div>
                    <div class="admin-category__list">
                        <ul id="list-image" class="row">
                            <span>QL HÌNH ẢNH</span>
                            <li class="admin-category__item image"><a href="{{URL:: to ('list-slide?page=1')}}">DS HÌNH SLIDESHOW</a></li>
                            <li class="admin-category__item image"><a href="{{URL:: to ('upload-slide')}}">UPLOAD HÌNH SLIDESHOW</a></li>
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