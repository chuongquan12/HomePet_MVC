@extends('welcomecustomer')
@section('content')

<?php
$id_khachhang = Session()->get('id_khachhang');
if (!$id_khachhang) {
    exit;
}
?>
<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ URL :: to('home')}}"><i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="">TÀI KHOẢN</a>
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
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col user">
                        <form action="{{URL :: to ('update-user')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="row user__title">
                                <span>Thông tin tài khoản</span>
                            </div>
                            <hr class="hr" />
                            <div class="row user__ip">
                                <label for="name">Họ và tên: </label>
                                <input type="text" class="form-control" name="name" value="{{ $customer -> HoTenKH }}" />
                                <input type="hidden" name="idKH" value="{{ $customer -> MSKH }}" />
                            </div>
                            <div class="row user__ip">
                                <label for="n_phone">Số điện thoại: </label>
                                <input type="text" class="form-control" name="n_phone" value="{{ $customer -> SoDienThoai }}" />
                            </div>
                            <div class=" row user__ip">
                                <label for="address">Địa chỉ: </label>
                                <input type="text" class="form-control" name="address" value="{{ $customer -> DiaChi}}" />
                            </div>
                            <br />
                            <div class="row justify-content-center">
                                <button type="submit" class="cart-detail__add-order" name="update-user">Chỉnh sửa <i class="fas fa-edit"></i></button>
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
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col user">
                        <form action="{{URL :: to ('change-password')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="row user__title">
                                <span>Đổi mật khẩu</span>
                            </div>
                            <hr class="hr" />
                            <div class="row user__ip">
                                <label for="password-old">Mật khẩu hiện tại: </label>
                                <input type="password" class="form-control" name="password_old" />
                                <input type="hidden" name="idKH" value="{{ $customer -> MSKH }}" />
                            </div>
                            <div class="row user__ip">
                                <label for="password-new">Mật khẩu mới: </label>
                                <input type="password" class="form-control" name="password_new" />
                            </div>
                            <div class="row user__ip">
                                <label for="re-password">Xác nhận mật khẩu: </label>
                                <input type="password" class="form-control" name="re_password" />
                            </div>
                            <br />
                            <div class="row justify-content-center">
                                <button type="submit" class="cart-detail__add-order" name="change-password">Chỉnh sửa <i class="fas fa-edit"></i></button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection