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


            $trademark = DB::table('tb_thuonghieu')->get();
            $type_1 =  DB::table('tb_thucung')->get();
            $type_2 = DB::table('tb_nhomhanghoa')->get();
            $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
            $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();
            $all_product = DB::table('tb_hanghoa')->get();
            $all_cart = DB::table('tb_giohang')->where('MSKH', $id_khachhang)->get();
            $customer = DB::table('tb_khachhang')->where('MSKH', $id_khachhang)->first();

            //Delete Product
            if (isset($_GET['rm_product'])) {
                $idHH = $_GET['rm_product'];

                DB::table('tb_giohang')->where('MSHH', $idHH)->delete();
                Session()->put('message', 'Xóa sản phẩm khỏi giỏ hàng');

                return Redirect::to('cart');
            }


            return view('pages.cart')
                ->with('trademark', $trademark)
                ->with('type_1', $type_1)
                ->with('type_2', $type_2)
                ->with('notification', $notification)
                ->with('count', $count)
                ->with('all_product', $all_product)
                ->with('all_cart', $all_cart)
                ->with('customer', $customer);
        }
    }

    public function add_cart(Request $request)
    {
        $data = array();

        $data['MSHH'] = $request['MSHH'];
        // Kiểm tra sản phẩm đã có trong giỏ hàng hay chưa
        $temp = DB::table('tb_giohang')->where('MSHH', $data['MSHH'])->first();
        if ($temp) {
            $SoLuong = $request['amount'] + $temp->SoLuong;

            DB::table('tb_giohang')->where('MSHH', $data['MSHH'])->update(['SoLuong' => $SoLuong]);

            Session()->put('message', 'Thêm sản phẩm vào giỏ hàng thành công');

            return Redirect::to('store');
        } else {
            $data['MSKH'] = $request['MSKH'];
            $data['SoLuong'] = $request['amount'];
            $data['NgayCN'] = Carbon::now();

            DB::table('tb_giohang')->insert($data);

            Session()->put('message', 'Thêm sản phẩm vào giỏ hàng thành công');

            return Redirect::to('store');
        }
    }
}
