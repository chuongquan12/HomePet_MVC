<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class OrderController extends Controller
{
    public function index()
    {
        $id_khachhang = Session()->get('id_khachhang');
        if (!$id_khachhang) {
            return Redirect::to('home');
        }

        $count_order = DB::table('tb_dathang')->count();

        if ($count_order == 0) {

            Session()->put('message', 'Hiện tại đơn hàng bạn đang trống!');
            return Redirect::to('store');
        } else {

            $now = Carbon::now();
            $day_notification = $now->subDays(5);

            $trademark = DB::table('tb_thuonghieu')->get();
            $type_1 =  DB::table('tb_thucung')->get();
            $type_2 = DB::table('tb_nhomhanghoa')->get();
            $notification =  DB::table('tb_dathang')->where('MSKH', $id_khachhang)->where('NgayXN', '>', $day_notification)->orderBy('SoDonDH', 'desc')->get();
            $count =  DB::table('tb_dathang')->where('MSKH', $id_khachhang)->where('NgayXN', '>', $day_notification)->count();
            $count_product =  DB::table('tb_giohang')->where('MSKH', $id_khachhang)->count();
            $all_order = DB::table('tb_dathang')->join('tb_khachhang', 'tb_dathang.MSKH', '=', 'tb_khachhang.MSKH')->where('tb_khachhang.MSKH', $id_khachhang)->get();

            $order_detail = array();
            $tong_GT = 0;
            $idDH = '';
            if (isset($_GET['idDH'])) {
                $idDH = $_GET['idDH'];
                $order_detail = DB::table('tb_chitietdathang')->where('SoDonDH', $idDH)->join('tb_hanghoa', 'tb_chitietdathang.MSHH', '=', 'tb_hanghoa.MSHH')->get();

                // Lấy tổng giá trị đơn hàng
                $temp = DB::table('tb_dathang')->where('SoDonDH', $idDH)->first();
                $tong_GT = $temp->TongThanhToan;
            }

            return view('pages.order')
                ->with('trademark', $trademark)
                ->with('type_1', $type_1)
                ->with('type_2', $type_2)
                ->with('notification', $notification)
                ->with('count', $count)
                ->with('count_product', $count_product)
                ->with('idDH', $idDH)
                ->with('tong_GT', $tong_GT)
                ->with('all_order', $all_order)
                ->with('order_detail', $order_detail);
        }
    }


    public function add_order(Request $request)
    {
        $MSKH =  $request['idKH'];

        $temp = DB::table('tb_dathang')->where('MSKH', $MSKH)->orderBy('SoDonDH', 'desc')->first();
        $temp_cart = DB::table('tb_giohang')->where('MSKH', $MSKH)->get();
        $all_product = DB::table('tb_hanghoa')->join('tb_giohang', 'tb_hanghoa.MSHH', '=', 'tb_giohang.MSHH')->where('MSKH', $MSKH)->get();

        // Kiểm tra số lượng sản phẩm và số lượng đặt hàng
        foreach ($all_product as $key) :
            if ($key->SoLuongHang < $key->SoLuong) {

                DB::table('tb_giohang')->where('MSKH', $MSKH)->where('MSHH', $key->MSHH)->delete();

                Session()->put('message', 'Đặt hàng không thành công, vui lòng cập nhật lại giỏ hàng');
                return Redirect::to('store');
            }
        endforeach;

        $data_order = array();
        $data_order_detail = array();

        // lấy request
        $data_order['MSKH'] =  $request['idKH'];
        $data_order['NgayDH'] =  Carbon::now('Asia/Ho_Chi_Minh');
        $data_order['TrangThai'] =  'Chờ xác nhận';
        $data_order['TongThanhToan'] =  $request['tongGT'];
        $data_order['MaDC'] =  $request['MaDC'];

        DB::table('tb_dathang')->insert($data_order);

        // Tạo bảng chi tiết đặt hàng của đơn hàng trên 

        foreach ($temp_cart as $key) :
            $data_order_detail['SoDonDH'] = $temp->SoDonDH;
            $data_order_detail['MSHH'] = $key->MSHH;
            $data_order_detail['SoLuong'] = $key->SoLuong;

            // Lấy giá hiện tại của sản phẩm
            $temp_product = DB::table('tb_hanghoa')->where('MSHH', $key->MSHH)->first();

            $data_order_detail['GiaDatHang'] = ($temp_product->Gia) * (100 - $temp_product->KhuyenMai) / 100;

            // Thêm vào trong bảng chi tiết
            DB::table('tb_chitietdathang')->insert($data_order_detail);

            // Cập nhật số luong hàng

            $product = DB::table('tb_hanghoa')->where('MSHH', $key->MSHH)->first();
            $amount = $product->SoLuongHang - $key->SoLuong;

            DB::table('tb_hanghoa')->where('MSHH', $key->MSHH)->update(['SoLuongHang' => $amount]);

        endforeach;

        // Xóa giỏ hàng hiện tại

        DB::table('tb_giohang')->where('MSKH', $MSKH)->delete();



        Session()->put('message', 'Đặt hàng thành công');

        return Redirect::to('store');
    }
}
