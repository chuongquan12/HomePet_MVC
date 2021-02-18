@extends('welcome')
@section('content')

<div class="">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href=""><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">SẢN PHẨM</a></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-8 col-sm-12 col-12 ">
        <div class="container product-detail">
            <div class="row">
                <div class="col-md-6 col-12 ">
                    <div class="row justify-content-center product__img">
                        <a href="">
                            <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                        </a>
                    </div>

                </div>
                <div class="col-md-6 col-12">
                    <div class="row product__title">
                        <a href="">Sữa tắm shfdg hjgfdsa dfsadfhasd jfhask hdfkhasdkjhd shdfgsa hsdfgh</a>
                    </div>
                    <div class="row product__description">
                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas jhdfgjshdf jhs t ế</span>
                    </div>
                    <div class="row product__price">
                        <div class="col-sm-6 col-6">
                            <div class="row">
                                <span class="product__price--1">1.000.000 VNĐ</span>
                            </div>
                            <div class="row">
                                <span class="product__price--2">1.000.000 VNĐ</span>
                            </div>
                        </div>
                        <div class="col-sm-6 col-6 align-self-center">
                            <div class="row">
                                <form action="">
                                    <button class="btn-icon"><i class="fas fa-plus"></i></button>
                                    <input type="text" class="input-amount">
                                    <button class="btn-icon"><i class="fas fa-minus"></i></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <a href="" class="add-to-cart --btn">Thêm vào giỏ hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12 col-12 slide-sale">
        <span class="slide-sale__sticker">SALE</span>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="container card-sale cards">
                    <span class="card-sale__sticker">50%</span>
                    <div class="row ">
                        <div class="col-md-6 col-6 card-sale__img card-img">
                            <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                        </div>
                        <div class="col-md-6 col-6">
                            <div class="row card-sale__title">
                                <a href="">Sữa tắm shfdg hjgfdsad shdfgsa hsdfgh</a>
                            </div>
                            <div class="row hidden-xs card-sale__description">
                                <span>sản phẩm giúp thoát ế</span>
                            </div>
                            <div class="row card-sale__price">
                                <span class="card__price--1">1.000.000 VNĐ</span>
                                <span class="card__price--2">1.000.000 VNĐ</span>
                            </div>
                            <div class="row justify-content-end mt-2">
                                <div class="card-sale__buy">
                                    <a href="">MUA NGAY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>


    </div>
</div>
<br>
<hr><br>
<div class="row">
    <div class="container-fluid">
        <div class="row list-card__title">
            <span>SẢN PHẨM CÙNG LOẠI</span>
        </div>
        <br>
        <div class="row list-card justify-content-center">
            <div class="col-12 ">
                <br>
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="container card-list">
                            <span class="card__sticker">50%</span>
                            <div class="row ">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                                    </a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title ">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas jhdfgjshdf jhs t ế</span>
                                    </div>
                                    <div class="row card__price">
                                        <div class="col-sm-8 col-12">
                                            <div class="row">
                                                <span class="card__price--1">1.000.000 VNĐ</span>
                                            </div>
                                            <div class="row">
                                                <span class="card__price--2">1.000.000 VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col align-self-center">
                                            <div class="row justify-content-end">
                                                <div class="card__buy">
                                                    <a href=""><i class="fas fa-cart-plus"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="container card-list">
                            <span class="card__sticker">50%</span>
                            <div class="row ">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                                    </a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title ">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas jhdfgjshdf jhs t ế</span>
                                    </div>
                                    <div class="row card__price">
                                        <div class="col-sm-8 col-12">
                                            <div class="row">
                                                <span class="card__price--1">1.000.000 VNĐ</span>
                                            </div>
                                            <div class="row">
                                                <span class="card__price--2">1.000.000 VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col align-self-center">
                                            <div class="row justify-content-end">
                                                <div class="card__buy">
                                                    <a href=""><i class="fas fa-cart-plus"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="container card-list">
                            <span class="card__sticker">50%</span>
                            <div class="row ">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                                    </a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title ">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas jhdfgjshdf jhs t ế</span>
                                    </div>
                                    <div class="row card__price">
                                        <div class="col-sm-8 col-12">
                                            <div class="row">
                                                <span class="card__price--1">1.000.000 VNĐ</span>
                                            </div>
                                            <div class="row">
                                                <span class="card__price--2">1.000.000 VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col align-self-center">
                                            <div class="row justify-content-end">
                                                <div class="card__buy">
                                                    <a href=""><i class="fas fa-cart-plus"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="container card-list">
                            <span class="card__sticker">50%</span>
                            <div class="row ">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm">
                                    </a>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title ">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas jhdfgjshdf jhs t ế</span>
                                    </div>
                                    <div class="row card__price">
                                        <div class="col-sm-8 col-12">
                                            <div class="row">
                                                <span class="card__price--1">1.000.000 VNĐ</span>
                                            </div>
                                            <div class="row">
                                                <span class="card__price--2">1.000.000 VNĐ</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col align-self-center">
                                            <div class="row justify-content-end">
                                                <div class="card__buy">
                                                    <a href=""><i class="fas fa-cart-plus"></i></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

@endsection