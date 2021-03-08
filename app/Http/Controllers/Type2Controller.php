<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class Type2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_type_2 = DB::table('tb_nhomhanghoa')->join('tb_thucung', 'tb_nhomhanghoa.MaTC', '=', 'tb_thucung.MaTC')->paginate(5);
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.product-type-2.list')
            ->with('all_type_2', $all_type_2)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    public function add()
    {
        $all_type_1 = DB::table('tb_thucung')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.product-type-2.add')
            ->with('all_type_1', $all_type_1)
            ->with('notification', $notification)
            ->with('count', $count);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:15',
        ], [
            'name.required' => 'Tên loại sản phẩm không được để trống',
            'name.max' => 'Tên loại sản phẩm không được quá 15 kí tự'
        ]);

        $data = array();
        $data['TenNhom'] = $request['name'];
        $data['MaTC'] = $request['MaTC'];
        $data['NgayCapNhat'] = Carbon::now();

        DB::table('tb_nhomhanghoa')->insert($data);

        Session()->put('message', 'Thêm loại sản phẩm thành công');

        return Redirect::to('add-type-2');
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
    public function show($idNhom)
    {
        $edit_type_2 = DB::table('tb_nhomhanghoa')->where('MaNhom', $idNhom)->get();
        $all_type_1 = DB::table('tb_thucung')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.product-type-2.edit')
            ->with('edit_type_2', $edit_type_2)
            ->with('all_type_1', $all_type_1)
            ->with('notification', $notification)
            ->with('count', $count);
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
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:15',
        ], [
            'name.required' => 'Tên loại sản phẩm không được để trống',
            'name.max' => 'Tên loại sản phẩm không được quá 15 kí tự'
        ]);

        $data = array();
        $MaNhom = $request['idNhom'];
        $data['TenNhom'] = $request['name'];
        $data['MaTC'] = $request['MaTC'];
        $data['NgayCapNhat'] = Carbon::now();

        DB::table('tb_nhomhanghoa')->where('MaNhom', $MaNhom)->update($data);

        Session()->put('message', 'Cập nhật loại sản phẩm thành công');

        return Redirect::to('list-type-2');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idNhom)
    {
        DB::table('tb_nhomhanghoa')->where('MaNhom', $idNhom)->delete();
        Session()->put('message', 'Xóa loại sản phẩm thành công');

        return Redirect::to('list-type-2');
    }
}
