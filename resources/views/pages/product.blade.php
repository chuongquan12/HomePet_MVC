<?php
$id_khachhang = Session()->get('id_khachhang');

if ($id_khachhang) {
    $extends = 'welcomecustomer';
} else {
    $extends = 'welcomeuser';
} ?>


@extends($extends)
@section('content')

<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL :: to('home')}}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL :: to('store')}}">CỬA HÀNG</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">{{ $product_detail -> TenHH }}</a></li>
        </ol>
    </nav>
</div>
<?php
$message = Session()->get('message');
if ($message) {
    echo '<span class="message" id="message">' . $message . '</span>';
}
Session()->put('message', NULL);
?>
<div class="row">
    <div class="col-md-7 col-sm-12 col-12">
        <div class="container product-detail">
            <form action="{{URL :: to ('add-cart')}}" method="POST">
                <div class="row">
                    <div class="col-md-6 col-12 ">
                        <div class="row product__img">
                            <a href="">
                                <img src="{{ asset('ImageUpload/Product/'.$product_detail -> Hinh)}}" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                            </a>
                        </div>

                    </div>
                    <div class="col-md-6 col-12 product__detail">
                        <div class="row product__title">
                            <a href="">{{ $product_detail -> TenHH }}</a>
                        </div>
                        <div class="row product__description">
                            <span>{{ $product_detail -> MoTaHH }}</span>
                        </div>
                        <div class="row product__price">
                            <div class="col-sm-6 col-6">
                                @if($product_detail -> KhuyenMai > 0 )
                                <div class="row">
                                    <span class="product__price--1">{{ number_format($product_detail -> Gia, 0, ',', '.') }}</span>
                                </div>
                                @endif
                                <div class="row">
                                    <span class="product__price--2">{{ number_format(($product_detail -> Gia)*(100 - $product_detail -> KhuyenMai) / 100, 0, ',', '.') }} VNĐ</span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-6 align-self-center">
                                <div class="row">
                                    <button class="btn-icon" id="icon_minus"><i class="fas fa-minus"></i></i></button>
                                    <input type="text" class="input-amount" id="input_amount" value="1" min="1" max="{{ $product_detail -> SoLuongHang }}" name="amount">
                                    <button class="btn-icon" id="icon_plus"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <?php if ($id_khachhang) { ?>
                                {{ csrf_field() }}
                                <input type="hidden" name="MSKH" value="{{ $id_khachhang }}">
                                <input type="hidden" name="MSHH" value="{{ $product_detail -> MSHH }}">
                                <button class="add-to-cart --btn" type="submit" name="add-to-cart">Thêm vào giỏ hàng</button>
                            <?php } else { ?>
                                <a href="{{ URL :: to('product/add_to_cart?idhh='.$product_detail -> MSHH)}}" class="add-to-cart --btn">Thêm vào giỏ hàng</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-5 col-sm-12 col-12 slide-sale ">
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
<br>
<hr><br>
<div class="row">
    <div class="container-fluid">
        <div class="row list-card__title">
            <span>SẢN PHẨM CÙNG LOẠI</span>
        </div>
        <br>
        <div class="row list-card justify-content-center">
            <div class="col-12 ">
                <br>
                <div class="row list-card justify-content-center">
                    <div class="col-12">
                        <br />
                        <div class="row">
                            <!--  Hiển thị 4 sản phẩm  -->
                            <?php $temp = 0; ?>
                            @foreach($product_recommend as $recommend)
                            <?php $temp++; ?>
                            @if($temp <= 4 && $recommend -> MSHH != $product_detail -> MSHH) <div class="col-md-3 col-6">
                                    <div class="container card-list">
                                        @if($recommend -> KhuyenMai > 0)
                                        <span class="card__sticker"> -{{ $recommend -> KhuyenMai }}% </span>
                                        @endif
                                        <div class="row">
                                            <div class="col-12 card__img">
                                                <a href="{{ URL :: to('product/'.$recommend -> MSHH)}}">
                                                    <img src="{{ asset('ImageUpload/Product/'.$recommend -> Hinh)}}" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 card__title-bg">
                                                <div class="row card__title">
                                                    <a href="{{ URL :: to('product/'.$recommend -> MSHH)}}">{{ $recommend -> TenHH }}</a>
                                                </div>
                                                <div class="row hidden-xs card__description">
                                                    <span>{{ $recommend -> MoTaHH }}</span>
                                                </div>
                                                <div class="row card__price">
                                                    <div class="col-sm-8 col-12">
                                                        @if($recommend -> KhuyenMai > 0 )
                                                        <div class="row">
                                                            <span class="card__price--1">{{ number_format($recommend -> Gia, 0, ',', '.') }}</span>
                                                        </div>
                                                        @endif
                                                        <div class="row">
                                                            <span class="card__price--2">{{ number_format(($recommend -> Gia)*(100 - $recommend -> KhuyenMai) / 100, 0, ',', '.') }} VNĐ</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col align-self-center">
                                                        <div class="row justify-content-end">
                                                            <div class="card__buy">
                                                                <a href="{{ URL :: to('product/'.$recommend -> MSHH)}}"><i class="fas fa-cart-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                        </div>
                        <br />
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection