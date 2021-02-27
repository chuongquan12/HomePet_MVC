@extends('welcomeuser')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL :: to('home')}}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL :: to('home')}}">TRANG CHỦ</a></li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-7 col-sm-12 col-12 slide-show">
        <div id="slide" class="carousel slide slide-show__bg" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('ImageUpload/slideshow/'.$slideshow_first -> DuongDan)}}" alt="Slide" />
                </div>
                @foreach($slideshow as $key)
                @if($key -> idHinh != $slideshow_first -> idHinh)
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('ImageUpload/slideshow/'.$key -> DuongDan)}}" alt="Slide" />
                </div>
                @endif
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#slide" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
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
<br />
<hr />
<br />
<div class="row">
    <div class="container-fulid">
        <div class="row list-card__title">
            <span>SẢN PHẨM NỔI BẬT</span>
        </div>
        <br />
        <div class="row list-card justify-content-center">
            <div class="col-12">
                <br />
                <div class="row">
                    <!--  Hiển thị 4 sản phẩm  -->
                    <?php $temp = 0; ?>
                    @foreach($product_best_seller as $best_seller)
                    <?php $temp++; ?>
                    @if($temp <= 4) <div class="col-md-3 col-6">
                        <div class="container card-list">
                            @if($best_seller -> KhuyenMai > 0)
                            <span class="card__sticker"> -{{ $best_seller -> KhuyenMai }}% </span>
                            @endif
                            <div class="row">
                                <div class="col-12 card__img">
                                    <a href="{{ URL :: to('product/'.$best_seller -> MSHH)}}">
                                        <img src="{{ asset('ImageUpload/Product/'.$best_seller -> Hinh)}}" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="{{ URL :: to('product/'.$best_seller -> MSHH)}}">{{ $best_seller -> TenHH }}</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>{{ $best_seller -> MoTaHH }}</span>
                                    </div>
                                    <div class="row card__price">
                                        <div class="col-sm-8 col-12">
                                            <div class="row">
                                                <span class="card__price--1">{{ $best_seller -> Gia }}</span>
                                            </div>
                                            <div class="row">
                                                <span class="card__price--2">{{ ($best_seller -> Gia)*(100 - $best_seller -> KhuyenMai) / 100 }} VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col align-self-center">
                                            <div class="row justify-content-end">
                                                <div class="card__buy">
                                                    <a href="{{ URL :: to('product/'.$best_seller -> MSHH)}}"><i class="fas fa-cart-plus"></i></a>
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
    </div>
</div>
</div>
<br />
<div class="row">
    <div class="container-fulid">
        <div class="row list-card__title">
            <span>SẢN PHẨM MỚI</span>
        </div>
        <br />
        <div class="row list-card justify-content-center">
            <div class="col-12">
                <br />
                <div class="row">
                    <!--  Hiển thị 4 sản phẩm  -->
                    <?php $temp = 0; ?>
                    @foreach($product_new as $new)
                    <?php $temp++; ?>
                    @if($temp <= 4) <div class="col-md-3 col-6">
                        <div class="container card-list">
                            @if($new -> KhuyenMai > 0)
                            <span class="card__sticker"> -{{ $new -> KhuyenMai }}% </span>
                            @endif
                            <div class="row">
                                <div class="col-12 card__img">
                                    <a href="{{ URL :: to('product/'.$new -> MSHH)}}">
                                        <img src="{{ asset('ImageUpload/Product/'.$new -> Hinh)}}" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="{{ URL :: to('product/'.$new -> MSHH)}}">{{ $new -> TenHH }}</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>{{ $new -> MoTaHH }}</span>
                                    </div>
                                    <div class="row card__price">
                                        <div class="col-sm-8 col-12">
                                            <div class="row">
                                                <span class="card__price--1">{{ $new -> Gia }}</span>
                                            </div>
                                            <div class="row">
                                                <span class="card__price--2">{{ ($new -> Gia)*(100 - $new -> KhuyenMai) / 100 }} VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col align-self-center">
                                            <div class="row justify-content-end">
                                                <div class="card__buy">
                                                    <a href="{{ URL :: to('product/'.$new -> MSHH)}}"><i class="fas fa-cart-plus"></i></a>
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
    </div>
</div>
</div>
<br />
<hr />

@endsection