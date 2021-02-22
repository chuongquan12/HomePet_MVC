@extends('admin')
@section('content')


@foreach($edit_product as $key )

<form class="form-bg" action="{{URL :: to ('update-product')}}" method="POST">
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
                <span>CHỈNH SỬA SẢN PHẨM</span>
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
                <input type="hidden" id="idHH" class="form-control" name="idHH" value="{{ $key -> MSHH }}" />
                <input type="text" id="name" class="form-control" name="name" value="{{ $key -> TenHH }}" />
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
                <input type="text" id="description" class="form-control" name="description" value="{{ $key -> MoTaHH }}" />
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
                <input type="text" id="amount" class="form-control" name="amount" value="{{ $key -> SoLuongHang }}" />
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
                    @foreach($all_type_2 as $key_type_2)
                    <option value="{{ $key_type_2 -> MaNhom }}">{{ $key_type_2 -> TenNhom }}</option>
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
                    @foreach($all_trademark as $key_trademark)
                    <option value="{{ $key_trademark -> MaTH }}">{{ $key_trademark -> TenThuongHieu }}</option>
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
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class=" row">
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
                <input type="number" id="price" class="form-control" name="price" value="{{ $key -> Gia }}" />
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
                <input type="text" id="discount" class="form-control" name="discount" value="{{ $key -> KhuyenMai }}" />
            </div>
            <div class="row">
                <div><i class="error" id="error_4"></i></div>
            </div>
        </div>
    </div>
    <br />
    <div class="row justify-content-end">
        <div class="col-4 log-re__btn-submit">
            <button type="submit" name="sub-personnel-edit">Cập nhật</button>
        </div>
    </div>

</form>
@endforeach

@endsection