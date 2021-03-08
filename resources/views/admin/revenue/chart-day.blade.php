<?php
$id_nhanvien = Session()->get('id_nhanvien');
$id_admin = Session()->get('id_admin');
$extends = 'admin';

if ($id_nhanvien) {
    $extends = 'personnel';
}
if ($id_admin) {
    $extends = 'admin';
} ?>


@extends($extends)
@section('content')

<canvas id="myChart" data-order="{{ $chart_day }}"></canvas>

@endsection