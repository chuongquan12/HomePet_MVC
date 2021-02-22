@extends('admin')
@section('content')



<div class="col">
    <?php
    $message = Session()->get('message');
    if ($message) {
        echo '<span class="message" id="message">' . $message . '</span>';
    }
    Session()->put('message', NULL);
    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">MÃ THƯƠNG HIỆU</th>
                <th scope="col">TÊN THƯƠNG HIỆU</th>
                <th scope="col">NGÀY CẬP NHẬT</th>
                <th scope="col">TÙY CHỌN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_trademark as $key)
            <tr>
                <td>{{ $key -> MaTH  }}</td>
                <td>{{ $key -> TenThuongHieu  }}</td>
                <td>{{ $key -> NgayCapNhat  }}</td>
                <td class="icon-tb" id="tb-list-product-type-1__icon">
                    <span>
                        <a href="{{ URL:: to('edit-trademark/'.$key -> MaTH)}}" class="tb-list__icon"><i class="fas fa-edit"></i></a>

                    </span>
                    <span>
                        <a href="{{ URL:: to('delete-trademark/'.$key -> MaTH)}}" class="tb-list__icon"><i class="fas fa-trash-alt"></i></a>

                    </span>
                </td>
            </tr>
            @endforeach

        </tbody>
</div>
@endsection