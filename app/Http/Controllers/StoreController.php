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
        $trademark = DB::table('tb_thuonghieu')->get();
        $type_1 =  DB::table('tb_thucung')->get();
        $type_2 = DB::table('tb_nhomhanghoa')->get();
        $product_sale_first = DB::table('tb_hanghoa')->where('KhuyenMai', '>', '0')->orderBy('KhuyenMai', 'desc')->first();
        $product_sale = DB::table('tb_hanghoa')->where('KhuyenMai', '>', '0')->orderBy('KhuyenMai', 'desc')->get();

        $all_product = DB::table('tb_hanghoa')->get();

        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $all_product = DB::table('tb_hanghoa')->where('TenHH', 'like', "%$search%")->get();
        }

        if (isset($_GET['th'])) {
            $th = $_GET['th'];
            $all_product = DB::table('tb_hanghoa')->where('MaTH', $th)->get();
        }

        if (isset($_GET['nhom'])) {
            $nhom = $_GET['nhom'];
            $all_product = DB::table('tb_hanghoa')->where('MaNhom', $nhom)->get();
        }



        return view('pages.user.store')
            ->with('trademark', $trademark)
            ->with('type_1', $type_1)
            ->with('type_2', $type_2)
            ->with('product_sale_first', $product_sale_first)
            ->with('product_sale', $product_sale)
            ->with('all_product', $all_product);
    }
}
