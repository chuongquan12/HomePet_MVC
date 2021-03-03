@extends('welcomecustomer')
@section('content')


<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href=""><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">GIỎ HÀNG</a></li>
        </ol>
    </nav>
</div>
<?php
$message = Session()->get('id_khachhang');
if ($message) {
    echo '<span class="message" id="message">' . $message . '</span>';
}
Session()->put('message', NULL);
?>
<div class="row">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-12">
                <div class="row cart-product align-items-center">
                    <div class="col-md-2 col-4">
                        <div class="row cart-product__img">
                            <a href="">
                                <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-8">
                        <div class="row cart-product__title">
                            <a href="">Sữa tắm shfdg hjgfds adfsadf hasdjf haskhdf khasdkj hd shdfgsa hsdfgh</a>
                        </div>
                    </div>
                    <div class="col-md-2 col-5">
                        <div class="row cart-product__amount">
                            <form action="">
                                <button class="btn-icon"><i class="fas fa-plus"></i></button>
                                <input type="text" class="input-amount">
                                <button class="btn-icon"><i class="fas fa-minus"></i></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 col-5">
                        <div class="row cart-product__price">
                            <span class="">1.000.000 VNĐ</span>
                        </div>
                    </div>
                    <div class="col-md-1 col-2 ">
                        <div class="row cart-product__delete--icon">
                            <a href=""><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row cart-product align-items-center">
                    <div class="col-md-2 col-4">
                        <div class="row cart-product__img">
                            <a href="">
                                <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-8">
                        <div class="row cart-product__title">
                            <a href="">Sữa tắm shfdg hjgfds adfsadf hasdjf haskhdf khasdkj hd shdfgsa hsdfgh</a>
                        </div>
                    </div>
                    <div class="col-md-2 col-5">
                        <div class="row cart-product__amount">
                            <form action="">
                                <button class="btn-icon"><i class="fas fa-plus"></i></button>
                                <input type="text" class="input-amount">
                                <button class="btn-icon"><i class="fas fa-minus"></i></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 col-5">
                        <div class="row cart-product__price">
                            <span class="">1.000.000 VNĐ</span>
                        </div>
                    </div>
                    <div class="col-md-1 col-2 ">
                        <div class="row cart-product__delete--icon">
                            <a href=""><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row cart-product align-items-center">
                    <div class="col-md-2 col-4">
                        <div class="row cart-product__img">
                            <a href="">
                                <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-8">
                        <div class="row cart-product__title">
                            <a href="">Sữa tắm shfdg hjgfds adfsadf hasdjf haskhdf khasdkj hd shdfgsa hsdfgh</a>
                        </div>
                    </div>
                    <div class="col-md-2 col-5">
                        <div class="row cart-product__amount">
                            <form action="">
                                <button class="btn-icon"><i class="fas fa-plus"></i></button>
                                <input type="text" class="input-amount">
                                <button class="btn-icon"><i class="fas fa-minus"></i></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 col-5">
                        <div class="row cart-product__price">
                            <span class="">1.000.000 VNĐ</span>
                        </div>
                    </div>
                    <div class="col-md-1 col-2 ">
                        <div class="row cart-product__delete--icon">
                            <a href=""><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row cart-product align-items-center">
                    <div class="col-md-2 col-4">
                        <div class="row cart-product__img">
                            <a href="">
                                <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-8">
                        <div class="row cart-product__title">
                            <a href="">Sữa tắm shfdg hjgfds adfsadf hasdjf haskhdf khasdkj hd shdfgsa hsdfgh</a>
                        </div>
                    </div>
                    <div class="col-md-2 col-5">
                        <div class="row cart-product__amount">
                            <form action="">
                                <button class="btn-icon"><i class="fas fa-plus"></i></button>
                                <input type="text" class="input-amount">
                                <button class="btn-icon"><i class="fas fa-minus"></i></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 col-5">
                        <div class="row cart-product__price">
                            <span class="">1.000.000 VNĐ</span>
                        </div>
                    </div>
                    <div class="col-md-1 col-2 ">
                        <div class="row cart-product__delete--icon">
                            <a href=""><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-12">
                <div class="row cart-detail">
                    <div class="col">
                        <form action="">
                            <div class="row cart-detail__title">
                                <span>Thông tin chi tiết đặt hàng</span>
                            </div>
                            <hr class="hr">
                            <div class="row cart-detail__ip">
                                <label for="Name">Họ và tên: </label>
                                <input type="text" class="form-control" id="Name">
                            </div>
                            <div class="row cart-detail__ip">
                                <label for="Number-Phone">Số điện thoại: </label>
                                <input type="text" class="form-control" id="Number-Phone">
                            </div>
                            <div class="row cart-detail__ip">
                                <label for="Address">Địa chỉ: </label>
                                <input type="text" class="form-control" id="Address">
                            </div>
                            <hr class="hr">
                            <div class="row cart-detail__ip">
                                <div class="col">
                                    <label for="Name">Giá trị đơn hàng: </label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="Name" value="2000" disabled>
                                </div>
                            </div>
                            <div class="row cart-detail__ip">
                                <div class="col">
                                    <label for="Name">Phí ship: </label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="Name" disabled>
                                </div>
                            </div>
                            <div class="row cart-detail__ip">
                                <div class="col">
                                    <label for="Name">Tổng giá trị</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" id="Name" disabled>
                                </div>
                            </div>
                            <div class="row cart-detail__add-order justify-content-end">
                                <div class="col-8">
                                    <button type="submit">ĐẶT HÀNG</button>
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