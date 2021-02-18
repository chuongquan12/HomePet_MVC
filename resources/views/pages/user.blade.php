@extends('welcome')
@section('content')

<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <a href=""><i class="fas fa-home"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a href="">SẢN PHẨM</a>
            </li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col user">
                        <form action="">
                            <div class="row user__title">
                                <span>Thông tin tài khoản</span>
                            </div>
                            <hr class="hr" />
                            <div class="row user__ip">
                                <label for="Name">Họ và tên: </label>
                                <input type="text" class="form-control" id="Name" />
                            </div>
                            <div class="row user__ip">
                                <label for="Number-Phone">Số điện thoại: </label>
                                <input type="text" class="form-control" id="Number-Phone" />
                            </div>
                            <div class="row user__ip">
                                <label for="Address">Địa chỉ: </label>
                                <input type="text" class="form-control" id="Address" />
                            </div>
                            <br />
                            <div class="row user__edit justify-content-end">
                                <div class="col-8">
                                    <button type="submit">
                                        Chỉnh sửa <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="row">
                    <div class="col user">
                        <form action="">
                            <div class="row user__title">
                                <span>Đổi mật khẩu</span>
                            </div>
                            <hr class="hr" />
                            <div class="row user__ip">
                                <label for="Name">Mật khẩu hiện tại: </label>
                                <input type="text" class="form-control" id="Name" />
                            </div>
                            <div class="row user__ip">
                                <label for="Number-Phone">Mật khẩu mới: </label>
                                <input type="text" class="form-control" id="Number-Phone" />
                            </div>
                            <div class="row user__ip">
                                <label for="Address">Xác nhận mật khẩu: </label>
                                <input type="text" class="form-control" id="Address" />
                            </div>
                            <br />
                            <div class="row user__edit justify-content-end">
                                <div class="col-8">
                                    <button type="submit">
                                        Chỉnh sửa <i class="fas fa-edit"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection