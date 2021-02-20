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
    <div class="container-fluid">
        <header class="row">
            <div class="col header__logo">
                <div class="row align-items-center">
                    <div class="col-3">
                        <img src="{{('public/FrontEnd/img/logo/Logo-header.png')}}" alt="logo" class="header__logo--img" />
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
                <ul class="col-md-2 admin-category__list">
                    <li class="admin-category__item"><a href="">DS ĐƠN HÀNG</a></li>
                    <li class="admin-category__item"><a href="">DS NHÂN VIÊN</a></li>
                    <li class="admin-category__item"><a href="">DS VẬT NUÔI</a></li>
                    <li class="admin-category__item"><a href="">DS LOẠI SP</a></li>
                    <li class="admin-category__item"><a href="">DS THƯƠNG HIỆU</a></li>
                    <li class="admin-category__item"><a href="">DS SẢN PHẨM</a></li>
                </ul>
                <div class="col-md-9"></div>
            </div>
        </div>
    </div>
</body>