<?php
$id_nhanvien = Session()->get('id_nhanvien');
$id_admin = Session()->get('id_admin');

if ($id_nhanvien) {
    $extends = 'personnel';
}
if ($id_admin) {
    $extends = 'admin';
} ?>


@extends($extends)
@section('content')


<div class="col" id="tb-list-order">
    <div class="row">
        <div class="col-7">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MÃ ĐƠN</th>
                        <th scope="col">NGÀY ĐẶT HÀNG</th>
                        <th scope="col">TÊN NV</th>
                        <th scope="col">NGÀY XÁC NHẬN</th>
                        <th scope="col">TRẠNG THÁI</th>
                        <th scope="col">CHI TIẾT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_order as $key)
                    <tr>
                        <td>{{ $key -> SoDonDH  }}</td>
                        <td>{{ $key -> NgayDH  }}</td>
                        <td>{{ $key -> HoTenNV  }}</td>
                        <td>{{ $key -> NgayXN  }}</td>
                        <td>{{ $key -> TrangThai }}</td>
                        <td class="icon-minus"><a href="{{ URL :: to('list-order?idDH='.$key ->SoDonDH)}}"><i class="fas fa-minus-circle"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if(isset($_GET['idDH']))
        <div class="col-5">
            <div class="list-order-detail">
                <div class="row">
                    <div class="col">
                        <h5>Chi tiết đơn hàng: #{{ $order_detail -> SoDonDH }}</h5>
                        <ul>
                            <li>Họ tên khách hàng: <b>{{ $order_detail -> HoTenKH }}</b></li>
                            <li>Địa chỉ: <b>{{ $order_detail -> DiaChi }}</b></li>
                            <li>Số điện thoại: <b>{{ $order_detail -> SoDienThoai   }} </b></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h6>Danh sách sản phẩm: </h6>
                        <div class="row table-list-product-title">
                            <div class="col-2">Mã SP</div>
                            <div class="col-6">Tên sản phẩm</div>
                            <div class="col-2">Giá bán</div>
                            <div class="col-2">SL</div>
                        </div>
                        <div class="table-list-product">
                            @foreach($list_product as $product)
                            <div class="row ">
                                <div class="col-2">{{ $product -> MSHH  }}</div>
                                <div class="col-6 address_confirm">{{ $product -> TenHH  }}</div>
                                <div class="col-2">{{ number_format($product -> GiaDatHang, 0, ',', '.')}}</div>
                                <div class="col-2">x{{ $product -> SoLuong  }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">
                        <h6>Tổng thanh toán: {{number_format($order_detail -> TongThanhToan, 0, ',', '.') }} VNĐ</h6>
                    </div>
                </div>

            </div>
        </div>
        @endif
    </div>

</div>

@endsection