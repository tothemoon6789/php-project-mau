<?php

namespace App\Http\Controllers\Admin;

use App\AdminDanhmucCaphai;
use App\Adminsanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File as File2; 

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sanpham = Adminsanpham::orderBy('created_at', 'desc')->get();
        // return $tintuc;
        return view('admin.sanpham.index', ['sanpham' => $sanpham]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuccaphai = AdminDanhmucCaphai::all();
        //
        return view('admin.sanpham.create',['danhmuccaphai'=>$danhmuccaphai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //     $this->validate($request, [
    //         'filenames' => 'required',
    //         'filenames.*' => 'required'
    // ]);
    // $files = [];
    // if($request->hasfile('filenames'))
    // {
    //     foreach($request->file('filenames') as $file)
    //     {
    //         $name = time().rand(1,100).'.'.$file->extension();
    //         $file->move(public_path('uploads'), $name);  
    //         $files[] = $name;  
    //     }
    // }
    // $file= new File();
    // $file->filenames = $files;
    // $file->save();
    // return back()->with('success', 'Data Your files has been successfully added');
    public function store(Request $request)
    {

        // return $request;
        //
        //
        $this->validate($request, [
            'tieude' => 'required',
            'noidung' => 'required',
            'gia' => 'required',
            'mota' => 'required',
            'danhmuccaphai'=>'required',
            'filenames' => 'required',
            'filenames.*' => 'required'
        ], [
            'danhmuccaphai.required' => 'Phải thêm thông tin vào danh mục.',
            'gia.required' => 'Phải thêm giá.',
            'tieude.required' => 'Phải thêm thông tin vào tiêu đề.',
            'noidung.required' => 'Phải thêm thông tin vào nội dung.',
            'mota.required' => 'Phải thêm mô tả.',
            'filenames.required' => 'Phải thêm hình ảnh.'
        ]);
        $files = [];
        if($request->hasfile('filenames'))
		{
			foreach($request->file('filenames') as $file)
			{
			    $name = time().rand(1,100).'.'.$file->extension();
			    $file->move(public_path('uploads'), $name);  
			    $files[] = $name;  
			}
		}
        $danhmuccaphai = AdminDanhmucCaphai::where('id',$request->input('danhmuccaphai'))->first();
        
        $model = new Adminsanpham();
        $model->tieude = $request->input('tieude');
        $model->sen = Str::slug($request->input('tieude'), '-');
        $model->mota = $request->input('mota');
        $model->noidung = $request->input('noidung');
        $model->gia = $request->input('gia');
        $model->hinhanh = json_encode($files);
        $model->danhmuccapmot = $danhmuccaphai->danhmuccapmot;
        $model->sencapmot = $danhmuccaphai->sencapmot;
        $model->danhmuccaphai = $danhmuccaphai->danhmuccaphai;
        $model->sencaphai = $danhmuccaphai->sencaphai;
        $model->save();
        return redirect('/admin/san-pham')->with('success', 'Tải lên thành công !');
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
        $baiviet = Adminsanpham::find($id);
        //
        return view('admin.sanpham.show', ['baiviet' => $baiviet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // $this->validate($request, [
        //     'tieude' => 'required',
        //     'noidung' => 'required',
        //     'mota' => 'required',
        //     'danhmuccaphai'=>'required',
        //     'filenames' => 'required',
        //     'filenames.*' => 'required'
        // ], [
        //     'danhmuccaphai.required' => 'Phải thêm thông tin vào danh mục.',
        //     'tieude.required' => 'Phải thêm thông tin vào tiêu đề.',
        //     'noidung.required' => 'Phải thêm thông tin vào nội dung.',
        //     'mota.required' => 'Phải thêm mô tả.',
        //     'filenames.required' => 'Phải thêm hình ảnh.'
        // ]);
        $input = $request->all();
        $files = [];
        $files_remove = [];
        if($request->hasfile('filenames'))
		{
			foreach($request->file('filenames') as $file)
			{
			    $name = time().rand(1,100).'.'.$file->extension();
			    $file->move(public_path('uploads/'), $name);  
			    $files[] = $name;  
			}
		}

		if (isset($input['images_uploaded'])) {
			$files_remove = array_diff(json_decode($input['images_uploaded_origin']), $input['images_uploaded']);
			$files = array_merge($input['images_uploaded'], $files);
		} else {
			$files_remove = json_decode($input['images_uploaded_origin']);
		}
        $danhmuccaphai = AdminDanhmucCaphai::where('id',$request->input('danhmuccaphai'))->first();
        $file = Adminsanpham::find($id);
		// $file->filenames = $files;
        $file->tieude = $request->input('tieude');
        $file->sen = Str::slug($request->input('tieude'), '-');
        $file->mota = $request->input('mota');
        $file->gia = $request->input('gia');
        $file->noidung = $request->input('noidung');
        $file->hinhanh = json_encode($files);
        $file->danhmuccapmot = $danhmuccaphai->danhmuccapmot;
        $file->sencapmot = $danhmuccaphai->sencapmot;
        $file->danhmuccaphai = $danhmuccaphai->danhmuccaphai;
        $file->sencaphai = $danhmuccaphai->sencaphai;
		if($file->update()) {
			foreach ($files_remove as $file_name) {
				File2::delete(public_path("uploads/".$file_name));
			}
		}

        return redirect(route('adminsanpham.san-pham.index'))->with('success', 'Dữ liệu đã được cập nhật thành công.');
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
        $danhmuccaphai = AdminDanhmucCaphai::all();
        $row = Adminsanpham::where('id', $id)->first();
        //
        return view('admin.sanpham.update', ['row' => $row,'danhmuccaphai'=>$danhmuccaphai]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $row = Adminsanpham::where('id', $id)->first();
        $row->delete();
        //
        return redirect(route('adminsanpham.san-pham.index'))->with('success', 'Đã xoá sản phẩm: ' . $row->tieude . ' thành công');
    }
}
