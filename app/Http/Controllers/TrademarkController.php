<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_trademark = DB::table('tb_thuonghieu')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.trademark.list')
            ->with('all_trademark', $all_trademark)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    public function add()
    {
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.trademark.add')
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
        $data = array();
        $data['TenThuongHieu'] = $request['name'];
        $data['NgayCapNhat'] = Carbon::now();

        DB::table('tb_thuonghieu')->insert($data);

        Session()->put('message', 'Thêm thương hiệu thành công');

        return Redirect::to('add-trademark');
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
    public function show($idTH)
    {
        $edit_trademark = DB::table('tb_thuonghieu')->where('MaTH', $idTH)->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.trademark.edit')
            ->with('edit_trademark', $edit_trademark)
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
        $data = array();
        $MaTH = $request['idTH'];
        $data['TenThuongHieu'] = $request['name'];
        $data['NgayCapNhat'] = Carbon::now();

        DB::table('tb_thuonghieu')->where('MaTH', $MaTH)->update($data);

        Session()->put('message', 'Cập nhật thương hiệu thành công');

        return Redirect::to('list-trademark');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTH)
    {
        DB::table('tb_thuonghieu')->where('MaTH', $idTH)->delete();
        Session()->put('message', 'Xóa thương hiệu thành công');

        return Redirect::to('list-trademark');
    }
}
