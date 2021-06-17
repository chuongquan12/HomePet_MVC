<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class CartController extends Controller
{
    public function index()
    {
        $id_khachhang = Session()->get('id_khachhang');
        if (!$id_khachhang) {
            return Redirect::to('home');
        }

        $count_cart = DB::table('tb_giohang')->count();

        if ($count_cart == 0) {

            Session()->put('message', 'Hiện tại giỏ hàng bạn đang trống!');
            return Redirect::to('store');
        } else {

            $now = Carbon::now();
            $day_notification = $now->subDays(5);

            $trademark = DB::table('tb_thuonghieu')->get();
            $type_1 =  DB::table('tb_thucung')->get();
            $type_2 = DB::table('tb_nhomhanghoa')->get();
            $address = DB::table('tb_diachikh')->where('MSKH', $id_khachhang)->get();
            $notification =  DB::table('tb_dathang')->where('MSKH', $id_khachhang)->where('NgayXN', '>', $day_notification)->orderBy('SoDonDH', 'desc')->get();
            $count =  DB::table('tb_dathang')->where('MSKH', $id_khachhang)->where('NgayXN', '>', $day_notification)->count();
            $count_product =  DB::table('tb_giohang')->where('MSKH', $id_khachhang)->count();
            $all_product = DB::table('tb_hanghoa')->get();
            $all_cart = DB::table('tb_giohang')->where('MSKH', $id_khachhang)->orderBy('NgayCN', 'desc')->get();
            $customer = DB::table('tb_khachhang')->where('MSKH', $id_khachhang)->first();

            //Delete Product
            if (isset($_GET['rm_product'])) {
                $idHH = $_GET['rm_product'];
                $product_amount = DB::table('tb_giohang')->where('MSHH', $idHH)->first();

                DB::table('tb_giohang')->where('MSHH', $idHH)->delete();
                Session()->put('message', 'Xóa sản phẩm khỏi giỏ hàng');

                $product = DB::table('tb_hanghoa')->where('MSHH', $idHH)->first();


                $amount = $product->SoLuongHang + $product_amount->SoLuong;

                DB::table('tb_hanghoa')->where('MSHH', $idHH)->update(['SoLuongHang' => $amount]);

                return Redirect::to('cart');
            }


            return view('pages.cart')
                ->with('trademark', $trademark)
                ->with('type_1', $type_1)
                ->with('type_2', $type_2)
                ->with('address', $address)
                ->with('notification', $notification)
                ->with('count', $count)
                ->with('count_product', $count_product)
                ->with('all_product', $all_product)
                ->with('all_cart', $all_cart)
                ->with('customer', $customer);
        }
    }

    public function add_cart(Request $request)
    {
        $id_khachhang = Session()->get('id_khachhang');

        $data = array();

        $data['MSHH'] = $request['MSHH'];
        // Kiểm tra sản phẩm đã có trong giỏ hàng hay chưa
        $temp = DB::table('tb_giohang')->where('MSHH', $data['MSHH'])->where('MSKH', $id_khachhang)->first();
        $product = DB::table('tb_hanghoa')->where('MSHH', $data['MSHH'])->first();
        if ($temp) {

            $SoLuong = $request['amount'] + $temp->SoLuong;
            if ($SoLuong > $product->SoLuongHang) {
                DB::table('tb_giohang')->where('MSHH', $data['MSHH'])->update(['SoLuong' => $product->SoLuongHang]);
                Session()->put('message', 'Thêm sản phẩm vào giỏ hàng thành công');
            } else {
                DB::table('tb_giohang')->where('MSHH', $data['MSHH'])->update(['SoLuong' => $SoLuong]);

                Session()->put('message', 'Thêm sản phẩm vào giỏ hàng thành công');
            }

            return Redirect::to('store');
        } else {
            $data['MSKH'] = $id_khachhang;
            $data['SoLuong'] = $request['amount'];
            $data['NgayCN'] = Carbon::now('Asia/Ho_Chi_Minh');

            DB::table('tb_giohang')->insert($data);

            Session()->put('message', 'Thêm sản phẩm vào giỏ hàng thành công');

            return Redirect::to('store');
        }
    }

    public function add_address(Request $request)
    {
        $id_khachhang = Session()->get('id_khachhang');

        $data = array();

        $data['MSKH'] = $request['idKH'];
        $data['DiaChi'] = $request['add-address'];

        // Thêm địa chỉ mới
        DB::table('tb_diachikh')->insert($data);
        Session()->put('message', 'Thêm địa chỉ thành công');
        // Lấy MaDC mới thêm vào
        $temp = DB::table('tb_diachikh')->where('MSKH', $id_khachhang)->orderBy('MaDC', 'desc')->first();
        Session()->put('MaDC', $temp->MaDC);

        return Redirect::to('cart');
    }
}
