@extends('admin')
@section('content')


@foreach($edit_trademark as $key)

<form class="form-bg" action="{{URL :: to ('update-trademark')}}" method="POST">
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
                <span>CẬP NHẬT THƯƠNG HIỆU</span>
            </div>
        </div>
    </div>
    <hr class="hr" />
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="name">Tên thương hiệu: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="text" id="name" class="form-control" name="name" value="{{ $key -> TenThuongHieu  }}" />
                <input type="hidden" id="idTH" name="idTH" value="{{ $key -> MaTH  }}" />
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
            <button type="submit" name="sub-trademark-edit">Cập nhật</button>
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