<?php

namespace App\Http\Controllers\Customer;

use App\AdminDanhmucCaphai;
use App\AdminDanhmucCapmot;
use App\AdminGioithieu;
use App\AdminLienhe;
use App\Adminsanpham;
use App\Admintintuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $danhmuccapmot = AdminDanhmucCapmot::all();
        $danhmuccaphai = AdminDanhmucCaphai::all();
        $sanpham = Adminsanpham::orderBy('id', 'DESC')->paginate(10);
        return view('customer.trangchu', ['sanpham' => $sanpham,'danhmuccapmot'=>$danhmuccapmot,'danhmuccaphai'=>$danhmuccaphai]);
    }
    public function gioithieu()
    {
        $danhmuccapmot = AdminDanhmucCapmot::all();
        $danhmuccaphai = AdminDanhmucCaphai::all();
        $gioithieu = AdminGioithieu::where('id', 1)->first();
        return view('customer.gioithieu', ['gioithieu' => $gioithieu,'danhmuccapmot'=>$danhmuccapmot,'danhmuccaphai'=>$danhmuccaphai]);
    }
    public function lienhe()
    {
        $danhmuccapmot = AdminDanhmucCapmot::all();
        $danhmuccaphai = AdminDanhmucCaphai::all();
        $lienhe = AdminLienhe::where('id', 1)->first();

        return view('customer.lienhe', ['lienhe' => $lienhe,'danhmuccapmot'=>$danhmuccapmot,'danhmuccaphai'=>$danhmuccaphai]);
    }
    public function tintuc()
    {
        $danhmuccapmot = AdminDanhmucCapmot::all();
        $danhmuccaphai = AdminDanhmucCaphai::all();
        $tintuc = Admintintuc::orderBy('id', 'DESC')->paginate(10);


        return view('customer.tintuc', ['tintuc' => $tintuc,'danhmuccapmot'=>$danhmuccapmot,'danhmuccaphai'=>$danhmuccaphai]);
    }
    public function tintucchitiet(Request $request)
    {
        $danhmuccapmot = AdminDanhmucCapmot::all();
        $danhmuccaphai = AdminDanhmucCaphai::all();
        $tintucchitiet = Admintintuc::find($request->route('id'));


        return view('customer.tintucchitiet', ['tintucchitiet' => $tintucchitiet,'danhmuccapmot'=>$danhmuccapmot,'danhmuccaphai'=>$danhmuccaphai]);
    }
    public function sanphamchitiet(Request $request)
    {
        $danhmuccapmot = AdminDanhmucCapmot::all();
        $danhmuccaphai = AdminDanhmucCaphai::all();
        $sanphamchitiet = Adminsanpham::find($request->route('id'));


        return view('customer.sanphamchitiet', ['sanphamchitiet' => $sanphamchitiet,'danhmuccapmot'=>$danhmuccapmot,'danhmuccaphai'=>$danhmuccaphai]);
    }
    public function danhmucsanpham(Request $request)
    {
         $danhmuccapmot = AdminDanhmucCapmot::all();
        $danhmuccaphai = AdminDanhmucCaphai::all();
        $danhmucsanpham = Adminsanpham::where('sencaphai',$request->route('sencaphai'))->where('sencapmot',$request->route('sencapmot'))->orderBy('id', 'DESC')->paginate(10);


        return view('customer.danhmucsanpham', ['danhmucsanpham' => $danhmucsanpham,'danhmuccapmot'=>$danhmuccapmot,'danhmuccaphai'=>$danhmuccaphai]);
    }
}
