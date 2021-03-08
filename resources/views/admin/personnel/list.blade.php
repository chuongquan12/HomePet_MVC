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
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end   ">
            {{ $all_personnel -> links() }}
        </ul>
    </nav>
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
            @foreach($all_personnel as $key)
            <tr>
                <td>{{ $key -> MSNV  }}</td>
                <td>{{ $key -> HoTenNV  }}</td>
                <td>{{ $key -> ChucVu  }}</td>
                <td>{{ $key -> SoDienThoai  }}</td>
                <td>{{ $key -> DiaChi  }}</td>
                <td class="icon-tb" id="tb-list-personnel__icon">
                    <span>
                        <a href="{{ URL:: to('edit-personnel/'.$key -> MSNV)}}" class="tb-list__icon"><i class="fas fa-edit"></i></a>

                    </span>
                    <span>
                        <a href="{{ URL:: to('delete-personnel/'.$key -> MSNV)}}" class="tb-list__icon"><i class="fas fa-trash-alt"></i></a>

                    </span>
                </td>
            </tr>
            @endforeach

        </tbody>
</div>
@endsection