<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

session_start();

class UserController extends Controller
{
    public function index()
    {
        $id_khachhang = Session()->get('id_khachhang');
        if (!$id_khachhang) {
            return Redirect::to('home');
        }


        $trademark = DB::table('tb_thuonghieu')->get();
        $type_1 =  DB::table('tb_thucung')->get();
        $type_2 = DB::table('tb_nhomhanghoa')->get();
        $notification =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->get();
        $count =  DB::table('tb_hanghoa')->where('SoLuongHang', '<', '10')->count();
        $customer = DB::table('tb_khachhang')->where('MSKH', $id_khachhang)->first();


        return view('pages.user')
            ->with('trademark', $trademark)
            ->with('type_1', $type_1)
            ->with('type_2', $type_2)
            ->with('notification', $notification)
            ->with('count', $count)
            ->with('customer', $customer);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'address' => 'required|max:200',
            'n_phone' => 'required|numeric',
        ], [
            'required' => ':attribute không được để trống',
            'max' => ':attribute không được quá :max kí tự',
            'integer' => ':attribute phải nhập chỉ số',
        ], [
            'name' => 'Họ và tên',
            'address' => 'Địa chỉ',
            'n_phone' => 'Số điện thoại',
        ]);

        $data = array();
        $MSKH = $request['idKH'];
        $data['HoTenKH'] = $request['name'];
        $data['DiaChi'] = $request['address'];
        $data['SoDienThoai'] = $request['n_phone'];

        DB::table('tb_khachhang')->where('MSKH', $MSKH)->update($data);

        Session()->put('message', 'Cập nhật thông tin thành công');

        return Redirect::to('user');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password_old' => 'required|min:6|max:25',
            'password_new' => 'required|min:6|max:25',
            're_password' => 'same:password_new',
        ], [
            'required' => ':attribute không được để trống',
            'same' => ':attribute không khớp ',
            'max' => ':attribute không được quá :max kí tự',
            'min' => ':attribute nhỏ hơn :min kí tự',
        ], [
            'password_old' => 'Mật khẩu cũ',
            'password_new' => 'Mật khẩu mới',
            're_password' => 'Mật khẩu mới',
        ]);

        $MSKH = $request['idKH'];
        $password = md5($request->password_old);
        $check_pass = DB::table('tb_khachhang')->where('MSKH', $MSKH)->where('Password', $password)->first();
        // Kiểm tra xác nhận mật khẩu

        if ($check_pass) {
            $password_new = md5($request->password_new);

            DB::table('tb_khachhang')->where('MSKH', $MSKH)->update(['Password' => $password_new]);

            Session()->put('message', 'Đổi mật khẩu thành công');

            return Redirect::to('user');
        } else {
            Session()->put('message', 'Vui lòng kiểm tra lại mật khẩu!!!');

            return Redirect::to('user');
        }
    }
}
