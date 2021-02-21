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
                <th scope="col">MÃ NV</th>
                <th scope="col">TÊN NV</th>
                <th scope="col">CHỨC VỤ</th>
                <th scope="col">SĐT</th>
                <th scope="col">ĐỊA CHỈ</th>
                <th scope="col">TÙY CHỌN</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_personnel as $key => $personnel)
            <tr>
                <td>{{ $personnel -> MSNV  }}</td>
                <td>{{ $personnel -> HoTenNV  }}</td>
                <td>{{ $personnel -> ChucVu  }}</td>
                <td>{{ $personnel -> SoDienThoai  }}</td>
                <td>{{ $personnel -> DiaChi  }}</td>
                <td class="icon-tb" id="tb-list-personnel__icon">
                    <span>
                        <a href="{{ URL:: to('edit-personnel/'.$personnel -> MSNV)}}" class="tb-list__icon"><i class="fas fa-edit"></i></a>

                    </span>
                    <span>
                        <a href="{{ URL:: to('delete-personnel/'.$personnel -> MSNV)}}" class="tb-list__icon"><i class="fas fa-trash-alt"></i></a>

                    </span>
                </td>
            </tr>
            @endforeach

        </tbody>
</div>
@endsection