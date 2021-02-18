@extends('welcome')
@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href=""><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">ADMIN</a></li>
    </ol>
</nav>
<div class="row">
    <div class="col-md-7 col-sm-12 col-12 slide-show">
        <div id="carouselExampleIndicators" class="carousel slide slide-show__bg" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/slideshow_2.png" alt="First slide" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/slideshow_3.png" alt="Second slide" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/slideshow_4.png" alt="Third slide" />
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-md-5 col-sm-12 col-12 slide-sale">
        <span class="slide-sale__sticker">SALE</span>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="container card-sale cards">
                    <span class="card-sale__sticker">50%</span>
                    <div class="row">
                        <div class="col-md-6 col-6 card-sale__img card-img">
                            <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
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
<br />
<hr />
<br />
<div class="row">
    <div class="container-fluid">
        <div class="row list-card__title">
            <span>SẢN PHẨM NỔI BẬT</span>
        </div>
        <br />
        <div class="row list-card justify-content-center">
            <div class="col-12">
                <br />
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="container card-list">
                            <span class="card__sticker">50%</span>
                            <div class="row">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd
                                            shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf
                                            shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas
                                            jhdfgjshdf jhs t ế</span>
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
                            <div class="row">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd
                                            shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf
                                            shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas
                                            jhdfgjshdf jhs t ế</span>
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
                            <div class="row">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd
                                            shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf
                                            shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas
                                            jhdfgjshdf jhs t ế</span>
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
                            <div class="row">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd
                                            shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf
                                            shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas
                                            jhdfgjshdf jhs t ế</span>
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
                <br />
            </div>
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="container-fluid">
        <div class="row list-card__title">
            <span>SẢN PHẨM MỚI</span>
        </div>
        <br />
        <div class="row list-card justify-content-center">
            <div class="col-12">
                <br />
                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="container card-list">
                            <span class="card__sticker">50%</span>
                            <div class="row">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd
                                            shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf
                                            shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas
                                            jhdfgjshdf jhs t ế</span>
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
                            <div class="row">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd
                                            shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf
                                            shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas
                                            jhdfgjshdf jhs t ế</span>
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
                            <div class="row">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd
                                            shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf
                                            shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas
                                            jhdfgjshdf jhs t ế</span>
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
                            <div class="row">
                                <div class="col-12 card__img">
                                    <a href="">
                                        <img src="img/NH_1.png" class="img-fluid" alt="Responsive image" alt="sản phẩm" />
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 card__title-bg">
                                    <div class="row card__title">
                                        <a href="">Sữa tắm shfdg hjgfdsadfsadfhasdjfhaskhdfkhasdkjhd
                                            shdfgsa hsdfgh</a>
                                    </div>
                                    <div class="row hidden-xs card__description">
                                        <span>sản phẩm giúp thoásdfsadfasdfjashdkfsac sadf
                                            shjadfgsa hsgdfsa sgdjh asdvfjhas djhgfjhs jhgas
                                            jhdfgjshdf jhs t ế</span>
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
                <br />
            </div>
        </div>
    </div>
</div>
<br />
<hr />

@endsection