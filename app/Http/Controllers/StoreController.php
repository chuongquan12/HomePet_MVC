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

        $all_product = DB::table('tb_hanghoa')->paginate(12);

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $all_product = DB::table('tb_hanghoa')->where('TenHH', 'like', "%$search%")->paginate(12);
        }

        if (isset($_GET['th'])) {
            $th = $_GET['th'];
            $all_product = DB::table('tb_hanghoa')->where('MaTH', $th)->paginate(12);
        }

        if (isset($_GET['nhom'])) {
            $nhom = $_GET['nhom'];
            $all_product = DB::table('tb_hanghoa')->where('MaNhom', $nhom)->paginate(12);
        }

        $notification =  DB::table('tb_dathang')->where('MSKH', $id_khachhang)->where('NgayXN', '>', $day_notification)->orderBy('SoDonDH', 'desc')->get();
        $count = DB::table('tb_dathang')->where('MSKH', $id_khachhang)->where('NgayXN', '>', $day_notification)->count();
        $count_product =  DB::table('tb_giohang')->where('MSKH', $id_khachhang)->count();





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
