@extends('welcomecustomer')
@section('content')
<?php
$sum = 0;
$id_khachhang = Session()->get('id_khachhang');
if (!$id_khachhang) {
    header("refresh:0; url= home");
    die();
}
?>

<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ URL :: to('home')}}"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">GIỎ HÀNG</a></li>
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-12">
                @foreach($all_cart as $cart)
                @foreach($all_product as $product)
                @if( $cart -> MSHH == $product -> MSHH )
                <div class="row cart-product align-items-center">
                    <div class="col-md-2 col-4">
                        <div class="row cart-product__img">
                            <a href="{{ URL :: to('product/'.$product -> MSHH)}}">
                                <img src="{{ asset('ImageUpload/Product/'.$product -> Hinh)}}" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-8">
                        <div class="row cart-product__title">
                            <a href="{{ URL :: to('product/'.$product -> MSHH)}}">{{ $product -> TenHH }}</a>
                        </div>
                    </div>
                    <div class="col-md-1 col-2">
                        <div class="row cart-product__amount justify-content-center">
                            <span>x{{ ($cart -> SoLuong)}}</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-7">
                        <div class="row cart-product__price ">
                            <span>{{ number_format(($cart -> SoLuong)*($product -> Gia)*(100 - $product -> KhuyenMai) / 100, 0, ',', '.') }} VNĐ</span>
                        </div>
                    </div>
                    <div class="col-md-1 col-2">
                        <div class="row cart-product__delete--icon">
                            <a href="{{URL :: to ('cart?rm_product='.$product -> MSHH)}}"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
                <?php
                $sum += ($cart->SoLuong) * ($product->Gia) * (100 - $product->KhuyenMai) / 100;
                ?>

                @endif
                @endforeach
                @endforeach
            </div>
            <div class="col-md-5 col-12">
                <div class="row cart-detail">
                    <div class="col">
                        <form action="{{URL :: to ('add-order')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="row cart-detail__title">
                                <span>Thông tin chi tiết đặt hàng</span>
                            </div>
                            <hr class="hr">
                            <div class="row cart-detail__ip">
                                <label for="name">Họ và tên: </label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $customer -> HoTenKH }}">
                                <input type="hidden" class="form-control" name="idKH" value="{{ $id_khachhang }}">
                            </div>
                            <div class="row cart-detail__ip">
                                <label for="n_phone">Số điện thoại: </label>
                                <input type="text" class="form-control" id="n_phone" name="n_phone" value="{{ $customer -> SoDienThoai }}">
                            </div>
                            <div class=" row cart-detail__ip">
                                <label for="address">Địa chỉ: </label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $customer -> DiaChi }}">
                            </div>
                            <hr class=" hr">
                            <div class="row cart-detail__ip">
                                <div class="col">
                                    <label>Giá trị đơn hàng: </label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ number_format($sum, 0, ',', '.') }} VNĐ" disabled>
                                </div>
                            </div>
                            <div class="row cart-detail__ip">
                                <div class="col">
                                    <label>Phí ship: </label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ number_format(30000, 0, ',', '.') }} VNĐ">
                                </div>
                            </div>
                            <div class="row cart-detail__ip">
                                <div class="col">
                                    <label>Tổng giá trị</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" value="{{ number_format($sum + 30000, 0, ',', '.') }} VNĐ" disabled>
                                    <input type="hidden" class="form-control" name="tongGT" value="{{ $sum + 30000 }}">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="cart-detail__add-order" name="add-order">ĐẶT HÀNG</button>
                            </div>
                        </form>
                        <ul class="alert text-danger">
                            @foreach ( $errors -> all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection