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
<div class="row">
    <div class="col-md-7 col-sm-12 col-12 ">
        <div class="container product-detail">
            <div class="row">
                <div class="col-md-6 col-12 ">
                    <div class="row justify-content-center product__img">
                        <a href="">
                            <img src="{{ asset('ImageUpload/Product/'.$product_detail -> Hinh)}}" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                        </a>
                    </div>

                </div>
                <div class="col-md-6 col-12">
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
                                <span class="product__price--1">{{ $product_detail -> Gia }}</span>
                            </div>
                            @endif
                            <div class="row">
                                <span class="product__price--2">{{ ($product_detail -> Gia)*(100 - $product_detail -> KhuyenMai) / 100 }} VNĐ</span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-6 align-self-center">
                            <div class="row">
                                <form action="">
                                    <button class="btn-icon" id="icon_plus"><i class="fas fa-plus"></i></button>
                                    <input type="text" class="input-amount" id="input_amount" value="0" min="0">
                                    <button class="btn-icon" id="icon_minus"><i class="fas fa-minus"></i></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <a href="" class="add-to-cart --btn">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
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
                                                        <div class="row">
                                                            <span class="card__price--1">{{ $recommend -> Gia }}</span>
                                                        </div>
                                                        <div class="row">
                                                            <span class="card__price--2">{{ ($recommend -> Gia)*(100 - $recommend -> KhuyenMai) / 100 }} VNĐ</span>
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