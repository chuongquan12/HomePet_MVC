<?php
$id_nhanvien = Session()->get('id_nhanvien');
$id_admin = Session()->get('id_admin');
$extends = 'admin';
if ($id_nhanvien) {
    $extends = 'personnel';
}
if ($id_admin) {
    $extends = 'admin';
}
?>


@extends($extends)
@section('content')


<div class="col" id="tb-list-order">
    <div class="row">
        <div class="col">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end   ">
                    {{ $all_order -> links() }}
                </ul>
            </nav>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">MÃ ĐƠN</th>
                        <th scope="col">TÊN KH</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">ĐỊA CHỈ</th>
                        <th scope="col">NGÀY ĐẶT HÀNG</th>
                        <th scope="col">XÁC NHẬN</th>
                        <th scope="col">CHI TIẾT</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_order as $key)
                    <tr>
                        <td>{{ $key -> SoDonDH  }}</td>
                        <td>{{ $key -> HoTenKH  }}</td>
                        <td>{{ $key -> SoDienThoai  }}</td>
                        <td class="address_confirm">{{ $key -> DiaChi  }}</td>
                        <td>{{ $key -> NgayDH  }}</td>
                        <td class="icon_confirm">
                            <span class="icon"><a href="{{ URL :: to('list-order-confirm?action=accept&idDH='.$key ->SoDonDH)}}">Xác nhận</a></span>
                            <span class="icon"><a href="{{ URL :: to('list-order-confirm?action=cancel&idDH='.$key ->SoDonDH)}}">Hủy</a></span>
                        </td>
                        <td class=" icon-minus"><a href="{{ url()->full().'&action=detail&idDH='.$key ->SoDonDH}}"><i class="fas fa-minus-circle"></i></a>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        @if(isset($_GET['idDH']) && isset($_GET['action']))
        <div class="col">
            <div class="list-order-detail">
                <div class="row">
                    <div class="col-4">
                        <h5>Chi tiết đơn hàng: #{{ $idDH }}</h5>
                        <ul>
                            <li>Họ tên khách hàng: <b>{{ $order_detail -> HoTenKH }}</b></li>
                            <li>Địa chỉ: <b>{{ $order_detail -> DiaChi }}</b></li>
                            <li>Số điện thoại: <b>{{ $order_detail -> SoDienThoai   }} </b></li>
                            <li>Phí ship (COD): <b>30.000 VNĐ </b></li>
                        </ul>
                    </div>
                    <div class="col-8">
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
                                <div class="col-2">{{ number_format($product -> GiaDatHang, 0, ',', '.')}} VNĐ</div>
                                <div class="col-2">x{{ $product -> SoLuong  }}</div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-end">
                    <div class="col-4">
                        <h6>Tổng thanh toán: {{number_format($order_detail -> TongThanhToan, 0, ',', '.') }} VNĐ</h6>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>


@endsection