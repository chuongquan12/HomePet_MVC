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



<form class="form-bg" action="{{URL :: to ('save-product')}}" method="POST" enctype="multipart/form-data">
    <?php
    $message = Session()->get('message');
    if ($message) {
        echo '<span class="message" id="message">' . $message . '</span>';
    }
    Session()->put('message', NULL);
    ?>

    {{ csrf_field() }}

    <div class="row">
        <div class="col">
            <div class="row log-re__title-1">
                <span>THÊM MỚI SẢN PHẨM</span>
            </div>
        </div>
    </div>
    <hr class="hr" />
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="name">Tên sản phẩm: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="text" id="name" class="form-control" name="name" value="" />
            </div>
            <div class="row">
                <div><i class="error" id="error_1"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="description">Mô tả sản phẩm: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="text" id="description" class="form-control" name="description" value="" />
            </div>
            <div class="row">
                <div><i class="error" id="error_2"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="amount">Số lượng sản phẩm: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="number" id="amount" class="form-control" name="amount" value="0" min="0" max="100" />
            </div>
            <div class="row">
                <div><i class="error" id="error_3"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="manhom">Tên nhóm: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <select class="form-control" id="idNhom" name="idNhom">
                    @foreach($all_type_2 as $key)
                    <option value="{{ $key -> MaNhom }}">{{ $key -> TenNhom }} - {{ $key -> TenThuCung }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div><i class="error" id="error_4"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="math">Tên thương hiệu: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <select class="form-control" id="idTH" name="idTH">
                    @foreach($all_trademark as $key)
                    <option value="{{ $key -> MaTH }}">{{ $key -> TenThuongHieu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div><i class="error" id="error_4"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="image">Hình ảnh sản phẩm: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="file" id="image" class="form-control" name="image" required="true" />
            </div>
            <div class="row">
                <div><i class="error" id="error_4"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="price">Giá sản phẩm: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="number" id="price" class="form-control" name="price" value="0" min="0" />
            </div>
            <div class="row">
                <div><i class="error" id="error_4"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="discount">Khuyến mãi: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="number" id="discount" class="form-control" name="discount" value="0" min="0" max="100" />
            </div>
            <div class="row">
                <div><i class="error" id="error_4"></i></div>
            </div>
        </div>
    </div>
    <br />
    <div class="row justify-content-end">
        <div class="col-4 log-re__btn-submit">
            <button type="submit" name="sub-product-add">Thêm</button>
        </div>
    </div>

    <ul class="alert text-danger">
        @foreach ( $errors -> all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</form>
@endsection