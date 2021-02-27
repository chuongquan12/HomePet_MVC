<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class Type1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_type_1 = DB::table('tb_thucung')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.product-type-1.list')
            ->with('all_type_1', $all_type_1)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    public function add()
    {
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.product-type-1.add')
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
            'name.required' => 'Tên thú cưng không được để trống',
            'name.max' => 'Tên thú cưng không được quá 15 kí tự'
        ]);
        $data = array();
        $data['TenThuCung'] = $request['name'];
        $data['NgayCapNhat'] = Carbon::now();

        DB::table('tb_thucung')->insert($data);

        Session()->put('message', 'Thêm thú cưng thành công');

        return Redirect::to('add-type-1');
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
    public function show($idTC)
    {
        $edit_type_1 = DB::table('tb_thucung')->where('MaTC', $idTC)->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.product-type-1.edit')
            ->with('edit_type_1', $edit_type_1)
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
            'name.required' => 'Tên thú cưng không được để trống',
            'name.max' => 'Tên thú cưng không được quá 15 kí tự'
        ]);

        $data = array();
        $MaTC = $request['idTC'];
        $data['TenThuCung'] = $request['name'];
        $data['NgayCapNhat'] = Carbon::now();

        DB::table('tb_thucung')->where('MaTC', $MaTC)->update($data);

        Session()->put('message', 'Cập nhật thú cưng thành công');

        return Redirect::to('list-type-1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTC)
    {
        DB::table('tb_thucung')->where('MaTC', $idTC)->delete();
        Session()->put('message', 'Xóa thú cưng thành công');

        return Redirect::to('list-type-1');
    }
}
