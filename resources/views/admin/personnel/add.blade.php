@extends('admin')
@section('content')



<form class="form-bg" action="{{URL :: to ('save-personnel')}}" method="POST">
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
                <span>THÊM NHÂN VIÊN</span>
            </div>
        </div>
    </div>
    <hr />
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="name">Họ và tên NV: </label>
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
            <label for="n-phone">Số điện thoại: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="text" id="n_phone" class="form-control" name="n_phone" onkeyup="xuli_2()" value="" />
            </div>
            <div class="row">
                <div><i class="error" id="error_2"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="address">Địa chỉ: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="text" id="address" class="form-control" name="address" onkeyup="xuli_3()" value="" />
            </div>
            <div class="row">
                <div><i class="error" id="error_3"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="position">Chức vụ: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <select class="form-control" id="position" name="position">
                    <option>Quản lý</option>
                    <option>Nhân viên</option>
                </select>
            </div>
            <div class="row">
                <div><i class="error" id="error_4"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="username">Username: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="text" id="username" class="form-control" name="username" value="" />
            </div>
            <div class="row">
                <div><i class="error" id="error_4"></i></div>
            </div>
        </div>
    </div>
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="username">Password: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="password" id="password" class="form-control" name="password" value="" />
            </div>
            <div class="row">
                <div><i class="error" id="error_4"></i></div>
            </div>
        </div>
    </div>
    <br />
    <div class="row justify-content-end">
        <div class="col-4 log-re__btn-submit">
            <button type="submit" class="sub-personnel-add" name="sub-personnel-add">Thêm</button>
        </div>
    </div>

    <ul class="alert text-danger">
        @foreach ( $errors -> all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</form>
@endsection