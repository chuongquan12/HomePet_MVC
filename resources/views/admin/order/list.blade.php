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
    <table class="table">
        <thead>
            <tr>
                <th scope="col">MÃ ĐƠN</th>
                <th scope="col">TÊN KH</th>
                <th scope="col">NGÀY ĐẶT HÀNG</th>
                <th scope="col">TÊN NV</th>
                <th scope="col">NGÀY XÁC NHẬN</th>
                <th scope="col">TRẠNG THÁI</th>
                <th scope="col">TỔNG ĐƠN HÀNG</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_order as $key)
            <tr>
                <td>{{ $key -> SoDonDH  }}</td>
                <td>{{ $key -> HoTenKH  }}</td>
                <td>{{ $key -> NgayDH  }}</td>
                <td>{{ $key -> HoTenNV  }}</td>
                <td>{{ $key -> NgayXN  }}</td>
                <td>{{ $key -> TrangThai }}</td>
                <td>{{ $key -> TongThanhToan  }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection