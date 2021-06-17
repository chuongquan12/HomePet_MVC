<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class StoreController extends Controller
{
    public function index()
    {
        $id_khachhang = Session()->get('id_khachhang');

        $now = Carbon::now();
        $day_notification = $now->subDays(5);

        $trademark = DB::table('tb_thuonghieu')->get();
        $type_1 =  DB::table('tb_thucung')->get();
        $type_2 = DB::table('tb_nhomhanghoa')->get();
        $product_sale_first = DB::table('tb_hanghoa')->where('KhuyenMai', '>', '0')->orderBy('KhuyenMai', 'desc')->first();
        $product_sale = DB::table('tb_hanghoa')->where('KhuyenMai', '>', '0')->orderBy('KhuyenMai', 'desc')->get();
        $notification =  DB::table('tb_dathang')->where('MSKH', $id_khachhang)->where('NgayXN', '>', $day_notification)->orderBy('SoDonDH', 'desc')->get();
        $count = DB::table('tb_dathang')->where('MSKH', $id_khachhang)->where('NgayXN', '>', $day_notification)->count();
        $count_product =  DB::table('tb_giohang')->where('MSKH', $id_khachhang)->count();

        $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->paginate(12);

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->where('TenHH', 'like', "%$search%")->paginate(12);
        }

        if (isset($_GET['th'])) {
            $th = $_GET['th'];
            $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->where('MaTH', $th)->paginate(12);
        }

        if (isset($_GET['nhom'])) {
            $nhom = $_GET['nhom'];
            $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->where('MaNhom', $nhom)->paginate(12);
        }

        return view('pages.store')
            ->with('trademark', $trademark)
            ->with('type_1', $type_1)
            ->with('type_2', $type_2)
            ->with('product_sale_first', $product_sale_first)
            ->with('product_sale', $product_sale)
            ->with('all_product', $all_product)
            ->with('notification', $notification)
            ->with('count', $count)
            ->with('count_product', $count_product);
    }

    public function filter(Request $request)
    {
        $id_khachhang = Session()->get('id_khachhang');

        $now = Carbon::now();
        $day_notification = $now->subDays(5);

        $trademark = DB::table('tb_thuonghieu')->get();
        $type_1 =  DB::table('tb_thucung')->get();
        $type_2 = DB::table('tb_nhomhanghoa')->get();
        $product_sale_first = DB::table('tb_hanghoa')->where('KhuyenMai', '>', '0')->orderBy('KhuyenMai', 'desc')->first();
        $product_sale = DB::table('tb_hanghoa')->where('KhuyenMai', '>', '0')->where('SoLuongHang', '>', 0)->orderBy('KhuyenMai', 'desc')->get();
        $notification =  DB::table('tb_dathang')->where('MSKH', $id_khachhang)->where('NgayXN', '>', $day_notification)->orderBy('SoDonDH', 'desc')->get();
        $count = DB::table('tb_dathang')->where('MSKH', $id_khachhang)->where('NgayXN', '>', $day_notification)->count();
        $count_product =  DB::table('tb_giohang')->where('MSKH', $id_khachhang)->count();

        $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->paginate(12);

        if ($request->price) {
            // Nhân thêm 10000 với giá trị của price để dễ lọc giá
            switch ($request->price) {
                case '1':
                    $price_1 = 0;
                    $price_2 = 100000;
                    break;
                case '2':
                    $price_1 = 101000;
                    $price_2 = 200000;
                    break;
                case '5':
                    $price_1 = 201000;
                    $price_2 = 500000;
                    break;
                case '10':
                    $price_1 = 501000;
                    $price_2 = 10000000;
                    break;
            }

            $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->whereBetween('Gia', [$price_1, $price_2])->paginate(12);

            if ($request->trademark) {

                $th = $request->trademark;
                $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->whereBetween('Gia', [$price_1, $price_2])->where('MaTH', $th)->paginate(12);
            }

            if ($request->type_2) {

                $nhom = $request->type_2;
                $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->whereBetween('Gia', [$price_1, $price_2])->where('MaNhom', $nhom)->paginate(12);
            }
        } else {
            if ($request->trademark) {

                $th = $request->trademark;
                $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->where('MaTH', $th)->paginate(12);
                if ($request->type_2) {

                    $nhom = $request->type_2;
                    $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->where(['MaNhom' => $nhom, 'MaTH' => $th])->paginate(12);
                }
            } else {
                if ($request->type_2) {

                    $nhom = $request->type_2;
                    $all_product = DB::table('tb_hanghoa')->where('SoLuongHang', '>', 0)->where('MaNhom', $nhom)->paginate(12);
                }
            }
        }







        return view('pages.store')
            ->with('trademark', $trademark)
            ->with('type_1', $type_1)
            ->with('type_2', $type_2)
            ->with('product_sale_first', $product_sale_first)
            ->with('product_sale', $product_sale)
            ->with('all_product', $all_product)
            ->with('notification', $notification)
            ->with('count', $count)
            ->with('count_product', $count_product);
    }
}
