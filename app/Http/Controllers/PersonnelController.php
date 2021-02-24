<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_personnel = DB::table('tb_nhanvien')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();


        return view('admin.personnel.list')
            ->with('all_personnel', $all_personnel)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    public function add()
    {
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.personnel.add')
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
        $data['HoTenNV'] = $request['name'];
        $data['DiaChi'] = $request['address'];
        $data['SoDienThoai'] = $request['n_phone'];
        $data['ChucVu'] = $request['position'];
        $data['Username'] = $request['username'];
        $data['Password'] = $request['password'];

        DB::table('tb_nhanvien')->insert($data);

        Session()->put('message', 'Thêm nhân viên thành công');

        return Redirect::to('add-personnel');
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
    public function show($idNV)
    {
        $edit_personnel = DB::table('tb_nhanvien')->where('MSNV', $idNV)->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.personnel.edit')->with('edit_personnel', $edit_personnel)
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
        $MSNV = $request['idNV'];
        $data['HoTenNV'] = $request['name'];
        $data['DiaChi'] = $request['address'];
        $data['SoDienThoai'] = $request['n_phone'];
        $data['ChucVu'] = $request['position'];

        DB::table('tb_nhanvien')->where('MSNV', $MSNV)->update($data);

        Session()->put('message', 'Cập nhật nhân viên thành công');

        return Redirect::to('list-personnel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idNV)
    {
        DB::table('tb_nhanvien')->where('MSNV', $idNV)->delete();
        Session()->put('message', 'Xóa nhân viên thành công');

        return Redirect::to('list-personnel');
    }
}
