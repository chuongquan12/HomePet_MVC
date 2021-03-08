<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_product = DB::table('tb_hanghoa')
            ->join('tb_thuonghieu', 'tb_hanghoa.MaTH', '=', 'tb_thuonghieu.MaTH')
            ->join('tb_nhomhanghoa', 'tb_hanghoa.MaNhom', '=', 'tb_nhomhanghoa.MaNhom')
            ->orderBy('MSHH', 'asc')
            ->paginate(5);
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return  view('admin.product.list')
            ->with('all_product', $all_product)
            ->with('notification', $notification)
            ->with('count', $count);
    }

    public function add()
    {
        $all_type_2 = DB::table('tb_nhomhanghoa')->join('tb_thucung', 'tb_nhomhanghoa.MaTC', '=', 'tb_thucung.MaTC')->get();
        $all_trademark = DB::table('tb_thuonghieu')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();

        return view('admin.product.add')
            ->with('all_type_2', $all_type_2)
            ->with('all_trademark', $all_trademark)
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
            'name' => 'required|max:50',
            'description' => 'max:200',
            'amount' => 'required',
            'image' => 'required|image',
            'price' => 'required',
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'image' => 'File :attribute phải có đuôi (jpeg, png, bmp, gif, hoặc svg)',
        ], [
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả',
            'amount' => 'Số lượng',
            'image' => 'Hình ảnh',
            'price' => 'Giá sản phẩm',
        ]);

        $data = array();
        $file = $request['image'];

        $data['TenHH'] = $request['name'];
        $data['MoTaHH'] = $request['description'];
        $data['SoLuongHang'] = $request['amount'];
        $data['MaNhom'] = $request['idNhom'];
        $data['MaTH'] = $request['idTH'];
        $data['Hinh'] = $file->getClientOriginalName();
        $data['Gia'] = $request['price'];
        $data['KhuyenMai'] = $request['discount'];
        $data['NgayCN'] = Carbon::now();
        $data['DaBan'] = 0;



        $file->move('ImageUpload/Product', $file->getClientOriginalName());

        DB::table('tb_hanghoa')->insert($data);

        Session()->put('message', 'Thêm sản phẩm thành công');

        return Redirect::to('add-product');
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
    public function show($idHH)
    {
        $edit_product = DB::table('tb_hanghoa')->where('MSHH', $idHH)->get();

        $all_type_2 = DB::table('tb_nhomhanghoa')->join('tb_thucung', 'tb_nhomhanghoa.MaTC', '=', 'tb_thucung.MaTC')->get();
        $all_trademark = DB::table('tb_thuonghieu')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();


        return view('admin.product.edit')
            ->with('edit_product', $edit_product)
            ->with('all_type_2', $all_type_2)
            ->with('all_trademark', $all_trademark)
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
            'name' => 'required|max:50',
            'description' => 'max:200',
            'amount' => 'required',
            'image' => 'required|image',
            'price' => 'required',
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'image' => 'File :attribute phải có đuôi (jpeg, png, bmp, gif, hoặc svg)',
        ], [
            'name' => 'Tên sản phẩm',
            'description' => 'Mô tả',
            'amount' => 'Số lượng',
            'image' => 'Hình ảnh',
            'price' => 'Giá sản phẩm',
        ]);

        $data = array();
        $file = $request['image'];

        $MSHH = $request['idHH'];
        $data['TenHH'] = $request['name'];
        $data['MoTaHH'] = $request['description'];
        $data['SoLuongHang'] = $request['amount'];
        $data['MaNhom'] = $request['idNhom'];
        $data['MaTH'] = $request['idTH'];
        $data['Hinh'] = $file->getClientOriginalName();
        $data['Gia'] = $request['price'];
        $data['KhuyenMai'] = $request['discount'];
        $data['NgayCN'] = Carbon::now();

        $file->move('ImageUpload/Product', $file->getClientOriginalName());

        DB::table('tb_hanghoa')->where('MSHH', $MSHH)->update($data);

        Session()->put('message', 'Cập nhật sản phẩm thành công');

        return Redirect::to('list-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idHH)
    {
        DB::table('tb_hanghoa')->where('MSHH', $idHH)->delete();
        Session()->put('message', 'Xóa sản phẩm thành công');

        return Redirect::to('list-product');
    }
}
