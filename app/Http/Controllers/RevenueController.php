<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();
class RevenueController extends Controller
{
    public function chart_day()
    {
        $chart_day = DB::table('tb_doanhso')->orderBy('Ngay', 'asc')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.revenue.chart-day')
            ->with('chart_day', $chart_day)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    public function chart_month()
    {
        $chart_day = DB::table('tb_doanhso')->orderBy('Ngay', 'asc')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.revenue.chart-day')
            ->with('chart_day', $chart_day)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    public function index()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');

        $day = $now->toDateString();

        $temp = DB::table('tb_doanhso')->where('Ngay', $day)->first();
        if ($temp) {
            Session()->put('acpect', true);
        } else {
            Session()->put('acpect', false);
        }

        // Tổng doanh thu một ngày
        $sum = DB::table('tb_dathang')
            ->where('TrangThai', 'Đã xác nhận')
            ->where('NgayXN', '>', $day)
            ->sum('TongThanhToan');

        // Số sản phẩm bán đc trong ngày
        $count_porduct_sell = DB::table('tb_dathang')
            ->where('TrangThai', 'Đã xác nhận')
            ->where('NgayXN', '>', $day)
            ->join('tb_chitietdathang', 'tb_dathang.SoDonDH', '=', 'tb_chitietdathang.SoDonDH')
            ->sum('SoLuong');

        // Số đơn hàng hoàn thành trong ngày
        $count_order_1 = DB::table('tb_dathang')
            ->where('TrangThai', 'Đã xác nhận')
            ->where('NgayXN', '>', $day)
            ->count();

        // Số đơn hàng bị hủy trong ngày
        $count_order_2 = DB::table('tb_dathang')
            ->where('TrangThai', 'Hủy đơn')
            ->where('NgayXN', '>', $day)
            ->count();

        // Số đơn hàng chờ xử lí trong ngày
        $count_order_3 = DB::table('tb_dathang')
            ->where('TrangThai', 'Chờ xác nhận')
            ->where('NgayXN', '>', $day)
            ->count();

        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.revenue.revenue')
            ->with('day', $day)
            ->with('sum', $sum)
            ->with('count_porduct_sell', $count_porduct_sell)
            ->with('count_order_1', $count_order_1)
            ->with('count_order_2', $count_order_2)
            ->with('count_order_3', $count_order_3)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    public function acpect()
    {
        $data = array();
        $now = Carbon::now('Asia/Ho_Chi_Minh');

        $day = $now->toDateString();

        // Tổng doanh thu một ngày
        $sum = DB::table('tb_dathang')
            ->where('TrangThai', 'Đã xác nhận')
            ->where('NgayXN', '>', $day)
            ->sum('TongThanhToan');

        $data['TongDoanhSo'] = $sum;
        $data['Ngay'] = $day;

        DB::table('tb_doanhso')->insert($data);

        Session()->put('message', 'Xác nhận thành công');

        return Redirect::to('chart-day');
    }
}
