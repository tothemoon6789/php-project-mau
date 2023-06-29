<?php

namespace App\Http\Controllers\Admin;

use App\AdminDanhmucCaphai;
use App\AdminDanhmucCapmot;
use App\Adminsanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmuccapmot = AdminDanhmucCapmot::all();
        $danhmuccaphai = AdminDanhmucCaphai::all();
        //
        return view('admin.danhmuc.index', ['danhmuccapmot' => $danhmuccapmot, 'danhmuccaphai' => $danhmuccaphai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.danhmuc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Input::has('danhmuccaphai')) {
            // $this ->validate($request, [
            //     'danhmuccaphai'=>'required',
            // ],[
            //     'danhmuccaphai.required'=>'Không được để trống',
            // ]);
            $model = new AdminDanhmucCaphai();
            $model->danhmuccapmot = $request->input('danhmuccapmot');
            $model->sencapmot = Str::slug($request->input('danhmuccapmot'), '-');
            $model->danhmuccaphai = $request->input('danhmuccaphai');
            $model->sencaphai = Str::slug($request->input('danhmuccaphai'), '-');
            $model->save();
            return back()->with('message', 'Tải danh mục cấp 2 lên thành công !');
        }

        $this->validate($request, [
            'danhmuccapmot' => 'required',
        ], [
            'danhmuccapmot.required' => 'Không được để trống',
        ]);
        $model = new AdminDanhmucCapmot();
        $model->danhmuccapmot = $request->input('danhmuccapmot');
        $model->sencapmot = Str::slug($request->input('danhmuccapmot'), '-');
        $model->save();

        //
        return back()->with('message', 'Tải danh mục cấp 1 lên thành công !');
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
        if (Input::has('danhmuccaphai')) {
            $model = AdminDanhmucCaphai::where('id', $id)->first();

            $olddanhmuccaphai = $model->danhmuccaphai;
            $newdanhmuccaphai = $request->input('danhmuccaphai');
            $oldsen = $model->sencaphai;
            $newsen = Str::slug($request->input('danhmuccaphai'), '-');
    
            Adminsanpham::where('danhmuccaphai', $olddanhmuccaphai)->where('sencaphai', $oldsen)->update(['danhmuccaphai' => $newdanhmuccaphai, 'sencaphai' => $newsen]);

            $model->danhmuccapmot = $request->input('danhmuccapmot');
            $model->sencapmot = Str::slug($request->input('danhmuccapmot'), '-');
            $model->danhmuccaphai = $request->input('danhmuccaphai');
            $model->sencaphai = Str::slug($request->input('danhmuccaphai'), '-');
            $model->save();
            return back()->with('message', 'Cập nhật id: ' . $id . ' danh mục 2 thành công.');
        }
        $this->validate($request, [
            'danhmuccapmot' => 'required',
        ], [
            'danhmuccapmot.required' => 'Không được để trống',
        ]);
        //
        // Adminsanpham::query()->update(['sencapmot'=>'may-thong-minh']);
        // return  Adminsanpham::all();
        $model = AdminDanhmucCapmot::where('id', $id)->first();
        $olddanhmuccapmot = $model->danhmuccapmot;
        $newdanhmuccapmot = $request->input('danhmuccapmot');
        $oldsen = $model->sencapmot;
        $newsen = Str::slug($request->input('danhmuccapmot'), '-');

        Adminsanpham::where('danhmuccapmot', $olddanhmuccapmot)->where('sencapmot', $oldsen)->update(['danhmuccapmot' => $newdanhmuccapmot, 'sencapmot' => $newsen]);
        AdminDanhmucCaphai::where('danhmuccapmot', $olddanhmuccapmot)->where('sencapmot', $oldsen)->update(['danhmuccapmot' => $newdanhmuccapmot, 'sencapmot' => $newsen]);
        // SỬA BÊN TABLE SẢN TRUOC ROI SAU DO CAP NHAT

        $model->danhmuccapmot = $request->input('danhmuccapmot');
        $model->sencapmot = Str::slug($request->input('danhmuccapmot'), '-');
        $model->save();
        return back()->with('message', 'Cập nhật id: ' . $id . 'danh mục 1 thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if (Input::has('danhmuccaphai')) {
            # code...
            $model = AdminDanhmucCaphai::where('id', $id)->first();
            $model->delete();
            return back()->with('message', 'Xoá thành công id: ' . $id . ' của danh mục cấp 2');
        }
        $model = AdminDanhmucCapmot::where('id', $id)->first();
        $model->delete();
        return back()->with('message', 'Xoá thành công id: ' . $id . ' của danh mục cấp 1');
    }
}
