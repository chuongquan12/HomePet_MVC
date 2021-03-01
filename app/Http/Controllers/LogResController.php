<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class LogResController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_res()
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

        return view('pages.user.register')
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

    public function index_log()
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

        return view('pages.user.register')
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_res(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'n_phone' => 'required|numeric',
            'address' => 'required|max:200',
            'username' => 'required|min:3|max:25|unique:tb_khachhang,username',
            'password' => 'required|min:6|max:25',
            're_password' => 'same:password',
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'min' => ':attribute nhỏ hơn :min kí tự',
            'numeric' => ':attribute phải nhập chỉ số',
            'same' => ':attribute không khớp ',
            'unique' => ':attribute đã tồn tại ',
        ], [
            'name' => 'Họ và tên',
            'n_phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'username' => 'Tên đăng nhập',
            'password' => 'Mật khẩu',
            're_password' => 'Mật khẩu',
        ]);

        $data = array();
        $data['HoTenKH'] = $request['name'];
        $data['DiaChi'] = $request['address'];
        $data['SoDienThoai'] = $request['n_phone'];
        $data['Username'] = $request['username'];
        $data['Password'] = $request['password'];

        DB::table('tb_khachhang')->insert($data);

        Session()->put('message', 'Đăng ký thành công');

        return Redirect::to('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
