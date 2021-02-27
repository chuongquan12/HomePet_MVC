@extends('admin')
@section('content')


@foreach($edit_type_2 as $key)


<form class="form-bg" action="{{URL :: to ('update-type-2')}}" method="POST">
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
                <span>CHỈNH SỬA LOẠI SẢN PHẨM</span>
            </div>
        </div>
    </div>
    <hr class="hr" />
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="name">Tên loại sản phẩm: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="text" id="name" class="form-control" name="name" value="{{ $key -> TenNhom }}" />
                <input type="hidden" id="idNhom" name="idNhom" value="{{ $key -> MaNhom  }}" />
            </div>
            <div class="row">
                <div><i class="error" id="error_1"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="MaTC">Loại vật nuôi: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <select class="form-control" id="position" name="MaTC">
                    @foreach($all_type_1 as $key)
                    <option value="{{ $key -> MaTC }}">{{ $key -> TenThuCung }}</option>
                    @endforeach

                </select>
            </div>
            <div class="row">
                <div><i class="error" id="error_4"></i></div>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div class="row justify-content-end">
        <div class="col-4 log-re__btn-submit">
            <button type="submit" name="sub-type-2-add">Cập nhật</button>
        </div>
    </div>

    <ul class="alert text-danger">
        @foreach ( $errors -> all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</form>

@endforeach

@endsection