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



<div class="row">
    <?php
    $message = Session()->get('message');
    if ($message) {
        echo '<span class="message" id="message">' . $message . '</span>';
    }
    Session()->put('message', NULL);
    ?>
    <table class="table m-0">
        <thead>
            <tr>
                <th scope="col">MÃ HÌNH ẢNH</th>
                <th scope="col">NGÀY CẬP NHẬT</th>
                <th scope="col-4">HÌNH</th>
                <th scope="col">TÙY CHỌN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_image as $key)
            <tr>
                <td>{{ $key -> idHinh  }}</td>
                <td>{{ $key -> NgayCapNhat  }}</td>
                <td>
                    <img src="{{ asset('ImageUpload/slideshow/'.$key -> DuongDan )}}" class="img-fluid product-img" alt="Responsive image" alt="Hình sản phẩm" />
                </td>
                <td class="icon-tb" id="tb-list-personnel__icon">
                    <span>
                        <a href="{{ URL:: to('delete-image/'.$key -> idHinh)}}" class="tb-list__icon"><i class="fas fa-trash-alt"></i></a>

                    </span>
                </td>
            </tr>
            @endforeach

        </tbody>
</div>
@endsection