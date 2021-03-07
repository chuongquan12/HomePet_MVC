@extends('welcomecustomer')
@section('content')
<?php
$id_khachhang = Session()->get('id_khachhang');
if (!$id_khachhang) {
    exit();
}
?>
<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ URL :: to('home')}}"><i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="">ĐƠN HÀNG</a>
            </li>
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
            <div class="col-md-8 col-12 order__bg">
                <div class="row">
                    <span class="order__title">DANH SÁCH ĐƠN HÀNG</span>
                </div>
                <div class="row order__table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col-1">MÃ ĐƠN</th>
                                <th scope="col-2">NGÀY ĐẶT</th>
                                <th scope="col">NGÀY XÁC NHẬN</th>
                                <th scope="col">TRẠNG THÁI</th>
                                <th scope="col">CHI TIẾT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all_order as $order)
                            <tr>
                                <td><a class="ID-order" href="{{ URL :: to('order?idDH='.$order ->SoDonDH)}}">{{ $order -> SoDonDH }}</a></td>
                                <td>{{ $order -> NgayDH }}</td>
                                @if($order -> NgayXN == NULL)
                                <td>Trống</td>
                                @else
                                <td>{{ $order -> NgayXN }}</td>
                                @endif
                                <td>{{ $order -> TrangThai }}</td>
                                <td><a class="ID-order" href="{{ URL :: to('order?idDH='.$order ->SoDonDH)}}"><i class="fas fa-minus-circle"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="row order-detail">
                    <div class="col">
                        <div class="row order-detail__title">
                            <span>CHI TIẾT ĐƠN HÀNG: #{{ $idDH }}</span>
                        </div>
                        <hr class="hr" />
                        <div class="row justify-content-center">
                            <div class="col-10 cart-detail__body">
                                @foreach($order_detail as $key_order_detail)
                                <div class="row cart-detail__body--item align-items-center">
                                    <div class="col-4 cart-detail__body--item--img">
                                        <img src="{{ asset('ImageUpload/Product/'.$key_order_detail -> Hinh)}}" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </div>
                                    <div class="col-6 cart-detail__body--item--title">
                                        <div class="row">
                                            <a href="{{ URL :: to('product/'.$key_order_detail -> MSHH)}}">{{ $key_order_detail -> TenHH }}</a>
                                        </div>
                                    </div>
                                    <div class="col-1 cart-detail__body--item--amount">
                                        <div class="row">
                                            <span>x{{ $key_order_detail -> SoLuong }}</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <hr class="hr" />

                        <div class="row order-detail__price">
                            <div class="col">
                                <label>Tổng giá trị</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value="{{ number_format($tong_GT, 0, ',', '.') }} VNĐ" disabled />
                            </div>
                        </div>
                        <br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection