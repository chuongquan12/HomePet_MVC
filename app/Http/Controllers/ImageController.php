<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_image = DB::table('tb_hinh')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return  view('admin.slideshow.list')
            ->with('all_image', $all_image)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    public function add()
    {
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.slideshow.add')
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
            'image' => 'required|image',
        ], [
            'image.required' => 'Hình ảnh không được để trống',
            'image.image' => 'File hình ảnh phải có đuôi (jpeg, png, bmp, gif, hoặc svg)',
        ]);

        $file = $request['image'];

        $data = array();
        $data['DuongDan'] = $file->getClientOriginalName();
        $data['NgayCapNhat'] = Carbon::now();


        $file->move('ImageUpload/slideshow', $file->getClientOriginalName());

        DB::table('tb_hinh')->insert($data);

        Session()->put('message', 'Thêm hình ảnh thành công');

        return Redirect::to('upload-slide');
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
    public function destroy($idHinh)
    {
        DB::table('tb_hinh')->where('idHinh', $idHinh)->delete();
        Session()->put('message', 'Xóa hình ảnh thành công');

        return Redirect::to('list-slide');
    }
}
