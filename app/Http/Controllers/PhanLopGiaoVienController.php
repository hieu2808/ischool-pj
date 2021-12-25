<?php

namespace App\Http\Controllers;

use App\Models\GiaoVien;
use App\Models\LopHoc;
use App\Models\PhanLopGiaoVien;
use Illuminate\Http\Request;

class PhanLopGiaoVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // Lấy thông tin lớp học và giáo viên
    public function assignTask($lop_hoc_id)
    {
        $assign = LopHoc::find($lop_hoc_id);

        $teacher = GiaoVien::all();

        return view('admin.assigntask', compact('assign', 'teacher'));
    }

    // Lấy thông tin phân lớp giáo viên theo lop_hoc_id
    public function changeTask($lop_hoc_id)
    {
        $assigntask = PhanLopGiaoVien::with('giaoVien')->where('lop_hoc_id', $lop_hoc_id)->first();

        $teachers = GiaoVien::all();
        // dd($assigntask);
        return view('admin.changetask', compact('assigntask', 'teachers'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Giao nhiệm vụ cho giáo viên -> quay trở về quản lý lớp học
    public function create(Request $request)
    {
        $data = $request->all();
        // dd($data);
        PhanLopGiaoVien::create($data);

        return redirect()->route('getClassManagement');
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

    //  Thay đổi giáo viên giảng dạy
    public function update(Request $request)
    {
        $data = request()->except(['_token']);

        // dd($data);

        PhanLopGiaoVien::find($request->id)->update($data);
        
        return redirect()->route('getClassManagement');
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
    }
}
