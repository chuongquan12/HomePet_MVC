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

            $trademark = DB::table('tb_thuonghieu')->get();
            $type_1 =  DB::table('tb_thucung')->get();
            $type_2 = DB::table('tb_nhomhanghoa')->get();
            $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
            $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();
            $all_order = DB::table('tb_dathang')->join('tb_khachhang', 'tb_dathang.MSKH', '=', 'tb_khachhang.MSKH')->where('tb_khachhang.MSKH', $id_khachhang)->get();

            $order_detail = array();
            $tong_GT = 0;
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
                ->with('tong_GT', $tong_GT)
                ->with('all_order', $all_order)
                ->with('order_detail', $order_detail);
        }
    }


    public function add_order(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'address' => 'required|max:200',
            'n_phone' => 'required|numeric',
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'integer' => ':attribute phải nhập chỉ số',
        ], [
            'name' => 'Họ và tên',
            'address' => 'Địa chỉ',
            'n_phone' => 'Số điện thoại',
        ]);

        $data_kh = array();
        $data_order = array();
        $data_order_detail = array();

        // Sửa đổi địa chỉ khách hàng
        $MSKH =  $request['idKH'];
        $data_kh['HoTenKH'] =  $request['name'];
        $data_kh['SoDienThoai'] =  $request['n_phone'];
        $data_kh['DiaChi'] =  $request['address'];

        DB::table('tb_khachhang')->where('MSKH', $MSKH)->update($data_kh);

        // Tạo đơn hàng mới trong csdl
        $data_order['MSKH'] =  $request['idKH'];
        $data_order['NgayDH'] =  Carbon::now();
        $data_order['TrangThai'] =  'Chờ xác nhận';
        $data_order['TongThanhToan'] =  $request['tongGT'];

        DB::table('tb_dathang')->insert($data_order);

        // Tạo bảng chi tiết đặt hàng của đơn hàng trên 
        $temp = DB::table('tb_dathang')->where('MSKH', $MSKH)->orderBy('SoDonDH', 'desc')->first();
        $temp_cart = DB::table('tb_giohang')->where('MSKH', $MSKH)->get();

        foreach ($temp_cart as $key) :
            $data_order_detail['SoDonDH'] = $temp->SoDonDH;
            $data_order_detail['MSHH'] = $key->MSHH;
            $data_order_detail['SoLuong'] = $key->SoLuong;

            // Lấy giá hiện tại của sản phẩm
            $temp_product = DB::table('tb_hanghoa')->where('MSHH', $key->MSHH)->first();

            $data_order_detail['GiaDatHang'] = ($temp_product->Gia) * (100 - $temp_product->KhuyenMai) / 100;

            // Thêm vào trong bảng chi tiết
            DB::table('tb_chitietdathang')->insert($data_order_detail);

        endforeach;

        // Xóa giỏ hàng hiện tại

        DB::table('tb_giohang')->where('MSKH', $MSKH)->delete();

        Session()->put('message', 'Đặt hàng thành công');

        return Redirect::to('store');
    }
}
