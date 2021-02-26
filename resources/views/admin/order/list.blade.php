@extends('admin')
@section('content')


<div class="col" id="tb-list-order">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">MÃ ĐƠN</th>
                <th scope="col">TÊN KH</th>
                <th scope="col">NGÀY ĐẶT HÀNG</th>
                <th scope="col">TÊN NV</th>
                <th scope="col">NGÀY XÁC NHẬN</th>
                <th scope="col">TỔNG ĐƠN HÀNG</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_order as $key)
            <tr>
                <td>{{ $key -> SoDonDH  }}</td>
                <td>{{ $key -> HoTenKH  }}</td>
                <td>{{ $key -> NgayDH  }}</td>
                <td>{{ $key -> HoTenNV  }}</td>
                <td>{{ $key -> NgayXN  }}</td>
                <td>{{ $key -> TongThanhToan  }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection