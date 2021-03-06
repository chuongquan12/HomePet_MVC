@extends('welcomeuser')
@section('content')
<?php
$id_khachhang = Session()->get('id_khachhang');
if ($id_khachhang) {
    header("refresh:0; url= home");
    die();
}
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL :: to('home')}}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL :: to('home')}}">ĐĂNG NHẬP</a></li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-7 col-sm-12 col-12 slide-show">
        <div class="login">
            <form action="{{URL :: to ('getLogin')}}" method="POST" enctype="multipart/form-data" role="form">
                <?php
                $message = Session()->get('message');
                if ($message) {
                    echo '<span class="message" id="message">' . $message . '</span>';
                }
                Session()->put('message', NULL);
                ?>

                {{ csrf_field() }}
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
                            <input type="text" placeholder="Tên đăng nhập" id="log-username" class="form-control" name="username" onkeyup="xuli_7()" />
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
                            <input type="password" placeholder="Từ 8- 16 kí tự" id="log-password" class="form-control" name="password" onkeyup="xuli_8()" />
                        </div>
                        <div class="row">
                            <div><i class="error" id="error_8"></i></div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row justify-content-center">
                    <div class="col-6 log-re__title-3">
                        <span>Bạn chưa có tài khoản? </span><a href="{{URL :: to ('register')}}">Đăng ký</a>
                    </div>
                    <div class="col-3 log-re__btn-submit">
                        <button type="submit">Xác nhận</button>
                    </div>
                </div>
                <ul class=" alert text-danger">
                    @foreach ( $errors -> all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </form>
        </div>
    </div>
    <div class="col-md-5 col-sm-12 col-12 slide-sale">
        <span class="slide-sale__sticker">SALE</span>
        <div class="row justify-content-center">
            <div class="col-10">
                <div id="product_sale" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container card-sale cards">
                                <span class="card-sale__sticker"> -{{ $product_sale_first -> KhuyenMai }}%</span>
                                <div class="row">
                                    <div class="col-md-6 col-6 card-sale__img card-img">
                                        <a href="{{ URL :: to('product/'.$product_sale_first -> MSHH)}}">
                                            <img src="{{ asset('ImageUpload/Product/'.$product_sale_first -> Hinh)}}" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <div class="row card-sale__title">
                                            <a href="{{ URL :: to('product/'.$product_sale_first -> MSHH)}}">{{ $product_sale_first -> TenHH }}</a>
                                        </div>
                                        <div class="row hidden-xs card-sale__description">
                                            <span>{{ $product_sale_first -> MoTaHH }}</span>
                                        </div>
                                        <div class="row card-sale__price">
                                            <span class="card__price--1">{{ number_format($product_sale_first -> Gia, 0, ',', '.')  }}</span>
                                            <span class="card__price--2">{{ number_format(($product_sale_first -> Gia)*(100 - $product_sale_first -> KhuyenMai) / 100, 0, ',', '.') }} VNĐ</span>
                                        </div>
                                        <div class="row justify-content-center mt-2">
                                            <div class="card-sale__buy">
                                                <a href="{{ URL :: to('product/'.$product_sale_first -> MSHH)}}">MUA NGAY</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($product_sale as $sale)
                        @if($sale -> MSHH != $product_sale_first -> MSHH)
                        <div class="carousel-item">
                            <div class="container card-sale cards">
                                <span class="card-sale__sticker"> -{{ $sale -> KhuyenMai }}%</span>
                                <div class="row">
                                    <div class="col-md-6 col-6 card-sale__img card-img">
                                        <a href="{{ URL :: to('product/'.$sale -> MSHH)}}">
                                            <img src="{{ asset('ImageUpload/Product/'.$sale -> Hinh)}}" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <div class="row card-sale__title">
                                            <a href="{{ URL :: to('product/'.$sale -> MSHH)}}">{{ $sale -> TenHH }}</a>
                                        </div>
                                        <div class="row hidden-xs card-sale__description">
                                            <span>{{ $sale -> MoTaHH }}</span>
                                        </div>
                                        <div class="row card-sale__price">
                                            <span class="card__price--1">{{ number_format($sale -> Gia, 0, ',', '.') }}</span>
                                            <span class="card__price--2">{{ number_format(($sale -> Gia)*(100 - $sale -> KhuyenMai) / 100, 0, ',', '.') }} VNĐ</span>
                                        </div>
                                        <div class="row justify-content-center mt-2">
                                            <div class="card-sale__buy">
                                                <a href="{{ URL :: to('product/'.$sale -> MSHH)}}">MUA NGAY</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#product_sale" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#product_sale" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<hr />

@endsection