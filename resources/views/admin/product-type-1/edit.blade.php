@extends('admin')
@section('content')


@foreach($edit_type_1 as $key)

<form class="form-bg" action="{{URL :: to ('update-type-1')}}" method="POST">
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
                <span>CẬP NHẬT THÚ CƯNG</span>
            </div>
        </div>
    </div>
    <hr class="hr" />
    <div class="row log-re__ip">
        <div class="col-4">
            <label for="name">Tên thú cưng: </label>
        </div>
        <div class="col-7">
            <div class="row">
                <input type="text" id="name" class="form-control" name="name" value="{{ $key -> TenThuCung  }}" />
                <input type="hidden" id="idTC" name="idTC" value="{{ $key -> MaTC  }}" />
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
            <button type="submit" name="sub-type-1-edit">Cập nhật</button>
        </div>
    </div>
</form>

@endforeach

@endsection