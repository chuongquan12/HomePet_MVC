@extends('admin')
@section('content')


<div class="col" id="tb-list-order">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">MÃ ĐƠN</th>
                <th scope="col">TÊN KH</th>
                <th scope="col">SĐT</th>
                <th scope="col">ĐỊA CHỈ</th>
                <th scope="col">TÊN NV</th>
                <th scope="col">TỔNG TIỀN</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Chương Quân</td>
                <td>0924668320</td>
                <td>Cà Mau</td>
                <td>trống</td>
                <td class="icon-tb" id="idorder" idorder="">
                    <span><i class="fas fa-minus-circle"></i></span>
                </td>
            </tr>
    </table>
</div>

@endsection