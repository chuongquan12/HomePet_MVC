@extends('welcomeuser')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL :: to('home')}}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL :: to('home')}}">ĐĂNG KÝ</a></li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-7 col-sm-12 col-12 slide-show">
        <div class="register">
            <form action="{{URL :: to ('getRegister')}}" method="POST" enctype="multipart/form-data" role="form">
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
                            <span>ĐĂNG KÝ</span>
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
                            <input type="text" placeholder="Họ và tên" id="name" class="form-control" name="name" onkeyup="xuli_1()" />
                        </div>
                        <div class="row">
                            <div><i class="error" id="error_1"></i></div>
                        </div>
                    </div>
                </div>
                <div class="row log-re__ip">
                    <div class="col-4">
                        <label for="n_phone">Số điện thoại: </label>
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
                <div class="row justify-content-center">
                    <div class="col-6 log-re__title-3">
                        <span>Bạn đã có tài khoản? </span><a href="{{URL :: to ('login')}}">Đăng nhập</a>
                    </div>
                    <div class="col-3 log-re__btn-submit">
                        <button type="submit" onclick="xuli()">Xác nhận</button>
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
                                            <span class="card__price--1">{{ $product_sale_first -> Gia }}</span>
                                            <span class="card__price--2">{{ ($product_sale_first -> Gia)*(100 - $product_sale_first -> KhuyenMai) / 100 }} VNĐ</span>
                                        </div>
                                        <div class="row justify-content-end mt-2">
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
                                            <span class="card__price--1">{{ $sale -> Gia }}</span>
                                            <span class="card__price--2">{{ ($sale -> Gia)*(100 - $sale -> KhuyenMai) / 100 }} VNĐ</span>
                                        </div>
                                        <div class="row justify-content-end mt-2">
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