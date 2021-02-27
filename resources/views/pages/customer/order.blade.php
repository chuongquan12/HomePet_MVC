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
                                <th scope="col">ĐỊA CHỈ</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">TRẠNG THÁI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ID-order"><a href="">123</a></td>
                                <td>08-02-2020</td>
                                <td>Cần thơ</td>
                                <td>0924668320</td>
                                <td>Hoàn thành</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="row order-detail">
                    <div class="col">
                        <div class="row order-detail__title">
                            <span>CHI TIẾT ĐƠN HÀNG: </span>
                        </div>
                        <hr class="hr" />
                        <div class="row justify-content-center">
                            <div class="col-10 cart-detail__body">
                                <div class="row cart-detail__body--item align-items-center">
                                    <div class="col-4 cart-detail__body--item--img">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </div>
                                    <div class="col-6 cart-detail__body--item--title">
                                        <div class="row">
                                            <a href="">sdfsjdfg sa f à s sdfasgf ghsdfghas</a>
                                        </div>
                                    </div>
                                    <div class="col-1 cart-detail__body--item--amount">
                                        <div class="row">
                                            <span>x1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row cart-detail__body--item align-items-center">
                                    <div class="col-4 cart-detail__body--item--img">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </div>
                                    <div class="col-6 cart-detail__body--item--title">
                                        <div class="row">
                                            <a href="">sdfsjdfg sa f à s sdfasgf ghsdfghas</a>
                                        </div>
                                    </div>
                                    <div class="col-1 cart-detail__body--item--amount">
                                        <div class="row">
                                            <span>x1</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row cart-detail__body--item align-items-center">
                                    <div class="col-4 cart-detail__body--item--img">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </div>
                                    <div class="col-6 cart-detail__body--item--title">
                                        <div class="row">
                                            <a href="">sdfsjdfg sa f à s sdfasgf ghsdfghas</a>
                                        </div>
                                    </div>
                                    <div class="col-1 cart-detail__body--item--amount">
                                        <div class="row">
                                            <span>x1</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="hr" />

                        <div class="row order-detail__price">
                            <div class="col">
                                <label for="Name">Tổng giá trị</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" id="Name" value="1.000.000 VNĐ" disabled />
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