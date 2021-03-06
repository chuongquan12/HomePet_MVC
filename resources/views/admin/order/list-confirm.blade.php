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
        <div class="col-8">
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
                        <td>{{ $key -> DiaChi  }}</td>
                        <td>{{ $key -> NgayDH  }}</td>
                        <td>
                            <span class="icon"><a href="{{ URL :: to('list-order-confirm?action=accept&idDH='.$key ->SoDonDH)}}">Xác nhận</a></span>
                            <span class="icon"><a href="{{ URL :: to('list-order-confirm?action=cancel&idDH='.$key ->SoDonDH)}}">Hủy</a></span>
                        </td>
                        <td class=" icon-minus"><a href="{{ URL :: to('list-order-confirm?action=detail&idDH='.$key ->SoDonDH)}}"><i class="fas fa-minus-circle"></i></a>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-4">
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
                            <input type="text" class="form-control" value="{{ $tong_GT }}" disabled />
                        </div>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </div>

</div>


@endsection