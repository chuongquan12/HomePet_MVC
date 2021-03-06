<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class ListOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_nhanvien = Session()->get('id_nhanvien');
        if (!$id_nhanvien) {
            return Redirect::to('home');
        }

        $all_order = DB::table('tb_dathang')->join('tb_khachhang', 'tb_dathang.MSKH', '=', 'tb_khachhang.MSKH')->join('tb_nhanvien', 'tb_dathang.MSNV', '=', 'tb_nhanvien.MSNV')->where('TrangThai', '<>', 'Chờ xác nhận')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.order.list')
            ->with('all_order', $all_order)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    public function confirm()
    {
        $id_nhanvien = Session()->get('id_nhanvien');
        if (!$id_nhanvien) {
            return Redirect::to('home');
        }

        $all_order = DB::table('tb_dathang')->join('tb_khachhang', 'tb_dathang.MSKH', '=', 'tb_khachhang.MSKH')->where('TrangThai', 'Chờ xác nhận')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        $order_detail = array();
        $tong_GT = 0;
        $idDH = '';
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            $idDH = $_GET['idDH'];

            switch ($action) {
                case "detail": {
                        $order_detail = DB::table('tb_chitietdathang')->where('SoDonDH', $idDH)->join('tb_hanghoa', 'tb_chitietdathang.MSHH', '=', 'tb_hanghoa.MSHH')->get();

                        // Lấy tổng giá trị đơn hàng
                        $temp = DB::table('tb_dathang')->where('SoDonDH', $idDH)->first();
                        $tong_GT = $temp->TongThanhToan;
                    }
                case "accept": {
                        $data = array();

                        $data['MSNV'] = $id_nhanvien;
                        $data['TrangThai'] = "Đã xác nhận";
                        $data['NgayXN'] = Carbon::now();
                        DB::table('tb_dathang')->where('SoDonDH', $idDH)->update($data);

                        Session()->put('message', 'Xác nhận đơn hàng thành công');

                        return Redirect::to('list-order-confirm');
                    }

                case "cancel": {
                        $data = array();

                        $data['MSNV'] = $id_nhanvien;
                        $data['TrangThai'] = "Hủy đơn";
                        $data['NgayXN'] = Carbon::now();

                        DB::table('tb_dathang')->where('SoDonDH', $idDH)->update($data);

                        Session()->put('message', 'Xác nhận đơn hàng thành công');

                        return Redirect::to('list-order-confirm');
                    }
            }
        }

        return view('admin.order.list-confirm')
            ->with('all_order', $all_order)
            ->with('tong_GT', $tong_GT)
            ->with('idDH', $idDH)
            ->with('order_detail', $order_detail)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
