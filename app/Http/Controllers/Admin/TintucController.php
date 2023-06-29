<?php

namespace App\Http\Controllers\Admin;

use App\Admintintuc;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TintucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tintuc = Admintintuc::orderBy('created_at', 'desc')->get();
        // return $tintuc;
        return view('admin.tintuc.index', ['tintuc' => $tintuc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        return view('admin.tintuc.create');
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
        $this->validate($request, [
            'tieude' => 'required',
            'noidung' => 'required',
            'hinhanh' => 'required',
        ], [
            'tieude.required' => 'Phải thêm thông tin vào tiêu đề.',
            'noidung.required' => 'Phải thêm thông tin vào nội dung.',
            'hinhanh.required' => 'Phải thêm hình ảnh.',
        ]);
        $image = $request->file('hinhanh')->getClientOriginalName();
        $path = $request->file('hinhanh')->storeAs('uploads', $image, 'public');
        $model = new Admintintuc();
        $model->tieude = $request->input('tieude');
        $model->sen = Str::slug($request->input('tieude'), '-');
        $model->noidung = $request->input('noidung');
        $model->hinhanh = "../../../../../" . $path;
        $model->save();
        return redirect('/admin/tin-tuc')->with('success', 'Tải lên thành công !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baiviet = Admintintuc::find($id);
        //
        return view('admin.tintuc.show',['baiviet'=>$baiviet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        if ($request->file('hinhanh')) {
            # code...
            $image = $request->file('hinhanh')->getClientOriginalName();
            $path = $request->file('hinhanh')->storeAs('uploads', $image, 'public');
            $model = Admintintuc::find($id);
            $model->tieude = $request->input('tieude');
            $model->sen = Str::slug($request->input('tieude'), '-');
            $model->noidung = $request->input('noidung');
            $model->hinhanh = "../../../../../" . $path;
            $model->save();
            return redirect('/admin/tin-tuc')->with('success', 'Cập nhật id: ' . $id . ' thành công !');
        }
        $model = Admintintuc::find($id);
        $model->tieude = $request->input('tieude');
        $model->sen = Str::slug($request->input('tieude'), '-');
        $model->noidung = $request->input('noidung');
        $model->save();
        return redirect('/admin/tin-tuc')->with('success', 'Cập nhật id: ' . $id . ' thành công !');
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

        $row = Admintintuc::where('id', $id)->first();
        //
        return view('admin.tintuc.update', ['row' => $row]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Admintintuc::where('id', $id)->first();
        $row->delete();
        //
        return redirect(route('admintintuc.tin-tuc.index'))->with('success', 'Đã xoá bài viết: ' . $row->tieude . ' thành công');
    }
}
