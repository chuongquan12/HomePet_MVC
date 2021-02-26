@extends('admin')
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
                <th scope="col">MÃ SP</th>
                <th scope="col">TÊN SP</th>
                <th scope="col">MÔ TẢ</th>
                <th scope="col">SL</th>
                <th scope="col">LOẠI SP</th>
                <th scope="col">THƯƠNG HIỆU</th>
                <th scope="col-1">HÌNH</th>
                <th scope="col">GIÁ</th>
                <th scope="col">KHUYẾN MÃI</th>
                <th scope="col">NGÀY CẬP NHẬT</th>
                <th scope="col">TÙY CHỌN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key)
            <tr>
                <td>{{ $key -> MSHH  }}</td>
                <td>{{ $key -> TenHH  }}</td>
                <td>{{ $key -> MoTaHH  }}</td>
                <td>{{ $key -> SoLuongHang  }}</td>
                <td>{{ $key -> TenNhom  }}</td>
                <td>{{ $key -> TenThuongHieu }}</td>
                <td>
                    <img src="{{ asset('ImageUpload/product/'.$key -> Hinh )}}" class="img-fluid product-img" alt="Responsive image" alt="Hình sản phẩm" />
                </td>
                <td>{{ $key -> Gia }}</td>
                <td>{{ $key -> KhuyenMai  }}</td>
                <td>{{ $key -> NgayCapNhat  }}</td>
                <td class="icon-tb" id="tb-list-personnel__icon">
                    <span>
                        <a href="{{ URL:: to('edit-product/'.$key -> MSHH)}}" class="tb-list__icon"><i class="fas fa-edit"></i></a>

                    </span>
                    <span>
                        <a href="{{ URL:: to('delete-product/'.$key -> MSHH)}}" class="tb-list__icon"><i class="fas fa-trash-alt"></i></a>

                    </span>
                </td>
            </tr>
            @endforeach

        </tbody>
</div>
@endsection