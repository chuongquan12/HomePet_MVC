@extends('admin')
@section('content')



<form class="form-bg" action="{{URL :: to ('save-image-slide')}}" method="POST" enctype="multipart/form-data">
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
                <span>THÊM HÌNH SLIDESHOW</span>
            </div>
        </div>
    </div>
    <hr class="hr" />
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="name">Chọn hình ảnh: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="file" id="image" class="form-control" name="image" required="true" />
            </div>
            <div class="row">
                <div><i class="error" id="error_1"></i></div>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div class="row justify-content-end">
        <div class="col-4 log-re__btn-submit">
            <button type="submit" name="sub-image-add">Thêm</button>
        </div>
    </div>
</form>
@endsection