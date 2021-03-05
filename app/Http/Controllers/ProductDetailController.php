<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductDetailController extends Controller
{
    public function index($idHH)
    {
        $trademark = DB::table('tb_thuonghieu')->get();
        $type_1 =  DB::table('tb_thucung')->get();
        $type_2 = DB::table('tb_nhomhanghoa')->get();
        $product_sale_first = DB::table('tb_hanghoa')->where('KhuyenMai', '>', '0')->orderBy('KhuyenMai', 'desc')->first();
        $product_sale = DB::table('tb_hanghoa')->where('KhuyenMai', '>', '0')->orderBy('KhuyenMai', 'desc')->get();
        $product_detail = DB::table('tb_hanghoa')->where('MSHH', $idHH)->first();
        $product_detail_nhom = $product_detail->MaNhom;
        $product_recommend = DB::table('tb_hanghoa')->where('MaNhom', $product_detail_nhom)->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('pages.product')
            ->with('trademark', $trademark)
            ->with('type_1', $type_1)
            ->with('type_2', $type_2)
            ->with('product_sale_first', $product_sale_first)
            ->with('product_sale', $product_sale)
            ->with('product_detail', $product_detail)
            ->with('product_recommend', $product_recommend)
            ->with('notification', $notification)
            ->with('count', $count);
    }


}
