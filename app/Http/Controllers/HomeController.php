<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class HomeController extends Controller
{
    public function index_user()
    {
        $trademark = DB::table('tb_thuonghieu')->get();
        $type_1 =  DB::table('tb_thucung')->get();
        $type_2 = DB::table('tb_nhomhanghoa')->get();
        $slideshow_first = DB::table('tb_hinh')->first();
        $slideshow = DB::table('tb_hinh')->get();
        $product_sale_first = DB::table('tb_hanghoa')->where('KhuyenMai', '>', '0')->orderBy('KhuyenMai', 'desc')->first();
        $product_sale = DB::table('tb_hanghoa')->where('KhuyenMai', '>', '0')->orderBy('KhuyenMai', 'desc')->get();
        $product_best_seller = DB::table('tb_hanghoa')->orderBy('DaBan', 'desc')->get();
        $product_new = DB::table('tb_hanghoa')->orderBy('NgayCN', 'desc')->get();

        return view('pages.user.home')
            ->with('trademark', $trademark)
            ->with('type_1', $type_1)
            ->with('slideshow', $slideshow)
            ->with('slideshow_first', $slideshow_first)
            ->with('product_sale_first', $product_sale_first)
            ->with('product_sale', $product_sale)
            ->with('product_best_seller', $product_best_seller)
            ->with('product_new', $product_new)
            ->with('type_2', $type_2);
    }
}
