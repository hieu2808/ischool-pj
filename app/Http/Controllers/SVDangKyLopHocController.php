<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Models\SVDangKyLopHoc;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SVDangKyLopHocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // Lấy thời gian hiện tại, vùng VN
        $currenttime = Carbon::now('Asia/Ho_Chi_Minh');

        // Lấy ds lớp học, ddkien time ngày bắt đầu lớn hơn time hiện tại
        $classes = LopHoc::with('monHoc')->where('ngay_bat_dau', '>', $currenttime)->get();

        $course_registration = SVDangKyLopHoc::where('sinh_vien_id', $id)->get();

        return view('sinhvien.courseregistration', compact('classes', 'currenttime', 'course_registration'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        $registration_time = Carbon::now('Asia/Ho_Chi_Minh');

        $data = array_merge(['sinh_vien_id' => $id], ['ngay_dang_ky' => $registration_time], $request->all());
        dd($data);

        return redirect()->route('course_registration', ['id' => $id]);

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
    public function destroy($id)
    {
        //
    }
}
