<?php
$id_nhanvien = Session()->get('id_nhanvien');
$id_admin = Session()->get('id_admin');
$extends = 'admin';
$acpect = Session()->get('acpect');

if ($id_nhanvien) {
    $extends = 'personnel';
}
if ($id_admin) {
    $extends = 'admin';
} ?>


@extends($extends)
@section('content')
<div class="row justify-content-center">
    <div class="col-10 list-revenue">
        <div class="row justify-content-center">
            <h5>KIỂM KÊ DOANH THU CỬA HÀNG</h5>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <h6 class="list-revenue__sum">Ngày <b>#{{ $day }}</b></h6>
                <hr>
                <li>Số đơn hàng hoàn thành: <b>{{ $count_order_1 }}</b></li>
                <li>Số đơn hàng bị hủy: <b>{{ $count_order_2 }}</b></li>
                <li>Số đơn hàng chờ xác nhận: <b>{{ $count_order_3 }}</b></li>
                <li>Số sản phẩm đã bán: <b>{{ $count_porduct_sell }}</b></li>
                <hr>
                <h6 class="list-revenue__sum">Tổng danh thu: <b>{{ number_format($sum, 0, ',', '.') }} VNĐ</b></h6>
                <br>
                @if(!$acpect)
                <div class="row justify-content-end list-revenue__btn">
                    <a href="{{ URL::to('revenue-acpect')}}">Xác nhận</a>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>

@endsection