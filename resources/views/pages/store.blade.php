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
            <li class="breadcrumb-item active" aria-current="page"><a href="">CỬA HÀNG</a></li>
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
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-3 col-12 ">
                <div class="row directory__title"><a href="{{URL:: to ('store')}}"><i class="fas fa-bars"></i> DANH MỤC SẢN PHẨM</a></div>
                <div class="directory">
                    <form action="{{URL :: to ('filter')}}" method="POST">
                        {{ csrf_field() }}

                        <div class=" directory__list">
                            <ul class="col">
                                <div class="row justify-content-end"><button type="submit" name="filter" class="icon-filter"><i class="fas fa-filter"></i></button></div>
                                <span>Giá</span>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" id="price_1" value="1">
                                    <label class="form-check-label" for="price_1">
                                        0-100.000
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" id="price_2" value="2">
                                    <label class="form-check-label" for="price_2">
                                        100.000-200.000
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" id="price_3" value="5">
                                    <label class="form-check-label" for="price_3">
                                        200.000-500.000
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="price" id="price_4" value="10">
                                    <label class="form-check-label" for="price_4">
                                        Trên 500.000
                                    </label>
                                </div>
                            </ul>
                        </div>
                        <div class="directory__list">
                            <ul class="col">
                                <span>THƯƠNG HIỆU</span>
                                @foreach($trademark as $key_trademark)
                                @if($key_trademark->TenThuongHieu != 'No brand')
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="trademark" id="trademark_{{ $key_trademark -> MaTH }}" value="{{ $key_trademark -> MaTH }}">
                                    <label class="form-check-label" for="trademark_{{ $key_trademark -> MaTH }}">
                                        {{ $key_trademark -> TenThuongHieu }}
                                    </label>
                                </div>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        @foreach($type_1 as $key_type_1)
                        <div class="directory__list">
                            <ul class="col">
                                <span>{{ $key_type_1 -> TenThuCung }}</span>
                                @foreach($type_2 as $key_type_2)
                                @if( $key_type_1 -> MaTC == $key_type_2 -> MaTC )
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type_2" id="type_2_{{ $key_type_2 -> MaNhom }}" value="{{ $key_type_2 -> MaNhom }}">
                                    <label class="form-check-label" for="type_2_{{ $key_type_2 -> MaNhom }}">
                                        {{ $key_type_2 -> TenNhom }}
                                    </label>
                                </div>
                                @endif
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </form>
                </div>

            </div>
            <div class=" col-md-9 col-12">
                <div class="row list-product">
                    @foreach($all_product as $product)
                    <div class="col-md-3 col-6">
                        <div class="container card-list">
                            @if($product -> KhuyenMai > 0)
                            <span class="card__sticker"> -{{ $product -> KhuyenMai }}% </span>
                            @endif
                            <div class="row">
                                <div class="col-12 card__img--store">
                                    <a href="{{ URL :: to('product/'.$product -> MSHH)}}">
                                        <img src="{{ asset('ImageUpload/Product/'.$product -> Hinh)}}" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="{{ URL :: to('product/'.$product -> MSHH)}}">{{ $product -> TenHH }}</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>{{ $product -> MoTaHH }}</span>
                                    </div>
                                    <div class="row card__price">
                                        <div class="col-sm-8 col-12">
                                            @if($product -> KhuyenMai > 0 )
                                            <div class="row">
                                                <span class="card__price--1">{{ number_format($product -> Gia, 0, ',', '.') }}</span>
                                            </div>
                                            @endif

                                            <div class="row">
                                                <span class="card__price--2">{{ number_format(($product -> Gia)*(100 - $product -> KhuyenMai) / 100, 0, ',', '.') }} VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col align-self-center">
                                            <div class="row justify-content-end">
                                                <div class="card__buy">
                                                    <a href="{{ URL :: to('product/'.$product -> MSHH)}}"><i class="fas fa-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end   ">
                        {{ $all_product -> links() }}
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</div>


@endsection